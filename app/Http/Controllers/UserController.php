<?php

namespace App\Http\Controllers;

use App\User;
use App\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        if(!empty(request()->get('query'))) {
            $users = User::where('name', 'LIKE', '%'.request()->get('query').'%')
                         ->where('roles', 1)
                         ->orWhere('email', 'LIKE', '%'.request()->get('query').'%')
                         ->where('roles', 1)
                         ->paginate(10);

            $users->appends(request()->all());
        }else{
            $users = User::where('roles', 1)->paginate(10);
        }

        return view('admin.users.user-list', compact('users'));
    }

    public function ban($id) {
        $user = User::find($id);

        if($user->is_banned == 1) {
            session()->flash('error', 'Hak akses pengguna telah dicabut!');
            return redirect()->back();
        }

        if($user->id == auth()->user()->id) {
            session()->flash('error', 'Tidak bisa mencabut hak akses akun sendiri!');
            return redirect()->back();
        }

        $user->is_banned = 1;
        $user->save();

        session()->flash('success', 'Hak akses pengguna sukses dicabut!');
        return redirect()->back();
    }

    public function unban($id) {
        $user = User::find($id);

        if($user->is_banned == 0) {
            session()->flash('error', 'Hak akses pengguna telah dikembalikan!');
            return redirect()->back();
        }

        $user->is_banned = 0;
        $user->save();

        session()->flash('success', 'Hak akses pengguna sukses dikembalikan!');
        return redirect()->back();
    }

    public function create() {
        return view('admin.users.add-user');
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'pass' => 'required'
        ],[
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'E-mail harus diisi!',
            'email.email' => 'E-mail tidak valid!',
            'pass.required' => 'Password tidak boleh kosong!'
        ]);

        $exist = User::where('email', request()->email)->first();
        if($exist) {
            session()->flash('error', 'E-mail sudah terpakai!');

            return redirect()->back()->withInput(request()->all());
        }

        $user = new User();

        $user->name = request()->name;
        $user->email = request()->email;
        $user->roles = 2;

        if(request()->pass != request()->pass_confirm) {
            session()->flash('error', 'Password tidak cocok!');

            return redirect()->back()->withInput(request()->all());
        }

        $user->password = bcrypt(request()->pass);

        $user->save();

        session()->flash('success', 'Psikolog berhasil ditambahkan!');

        return redirect()->route('psikolog.list');
    }

    public function edit($id) {
        $user = User::find($id);

        return view('admin.users.edit-user', compact('user'));
    }

    public function update($id) {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email'
        ],[
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'E-mail harus diisi!',
            'email.email' => 'E-mail tidak valid!'
        ]);

        $user = User::find($id);

        if(request()->email != $user->email) {
            $exist = User::where('email', request()->email)->first();

            if($exist) {
                session()->flash('error', 'E-mail sudah terpakai!');

                return redirect()->back();
            }
        }

        $user->name = request()->name;
        $user->email = request()->email;

        if(request()->pass != "") {
            if(request()->pass != request()->pass_confirm) {
                session()->flash('error', 'Password tidak cocok!');

                return redirect()->back();
            }
    
            $user->password = bcrypt(request()->pass);
        }

        $user->save();

        session()->flash('success', 'Data pengguna berhasil diubah!');

        return redirect()->route('psikolog.list');
    }

    public function editProfile() {
        $user = auth()->user();

        return view('admin.users.edit-profile', compact('user'));
    }

    public function updateProfile() {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|mimes:jpeg,png|max:1024'
        ],
        [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'E-mail harus diisi!',
            'email.email' => 'E-mail tidak valid!',
            'image.required' => 'Gambar signature tidak boleh kosong!',
            'image.image' => 'Signature harus berupa foto!',
            'image.mimes' => 'Signature harus beformat jpeg atau png!',
            'image.max' => 'Ukuran maksimum file 1MB!'
        ]);

        $user = auth()->user();

        if(request()->email != $user->email) {
            $exist = User::where('email', request()->email)->first();
            
            if($exist) {
                session()->flash('error', 'E-mail sudah terpakai!');

                return redirect()->back();
            }
        }

        $user->name = request()->name;
        $user->email = request()->email;

        if(request()->pass != "") {
            if(request()->pass != request()->pass_confirm) {
                session()->flash('error', 'Password tidak cocok!');

                return redirect()->back();
            }

            $user->password = bcrypt(request()->pass);
        }

        if(request()->image){
            $avatar = request()->image;

            $avatar_new = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move('uploads/avatars', $avatar_new);
            $user->avatar = 'uploads/avatars/' . $avatar_new;
        }

        $user->save();

        session()->flash('success', 'Data profil berhasil diubah!');

        return redirect()->route('home');
    }

    public function premium($id) {
        $user = User::find($id);
        if($user->roles != 1) {
            session()->flash('error', 'Premium tidak bisa untuk admin dan psikolog!');
            return redirect()->route('user.list');
        }

        if(count($user->memberships) > 0 && $user->memberships->last()->expired > \Carbon\Carbon::now()) {
            session()->flash('error', 'User masih memiliki akses premium yang aktif!');
            return redirect()->route('user.list');
        }

        $membership = new Membership();

        $membership->user_id = $id;
        $membership->started = Carbon::now();
        $membership->expired = Carbon::now()->addDays(30);
        $membership->save();

        session()->flash('success', 'User berhasil diberi akses premium!');

        return redirect()->route('user.list');
    }

    public function readReset() {
        $users = User::where('roles', 1)->get();

        foreach($users as $u) {
            $u->article_read = 0;

            $u->save();
        }

        session()->flash('success', 'Jumlah baca semua user berhasil di reset!');

        return redirect()->route('user.list');
    }

    public function pointReset($id) {
        $user = User::find($id);

        $user->points = 0;
        
        $user->save();

        session()->flash('success', 'Poin total user berhasil di reset!');

        return redirect()->route('user.list');
    }
}
