<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use Carbon\Carbon;
use App\Mail\ClaimPoints as CP;
use App\Notifications\PointBonus;
use Illuminate\Http\Request;

class PsikologController extends Controller
{
    public function index() {
        if(!empty(request()->get('query'))) {
            $users = User::where('name', 'LIKE', '%'.request()->get('query').'%')
                         ->where('roles', 2)
                         ->orWhere('name', 'LIKE', '%'.request()->get('query').'%')
                         ->where('roles', 2)
                         ->get();
        }else{
            $users = User::where('roles', 2)->get();
        }

        return view('admin.users.psikolog-list', compact('users'));
    }

    public function activity() {
        $id = auth()->user()->id;

        $list = Activity::where('user_id', $id)
                        ->OrderBy('created_at', 'desc')
                        ->paginate(10);

        return view('admin.users.psikolog-activity', compact('list'));
    }

    public function allActivity() {
        $list = Activity::OrderBy('created_at', 'desc')
                        ->paginate(10);

        $psikolog = User::where('roles', 2)->get();

        if(request()->uid != "") {
            $list = Activity::where('user_id', request()->uid)
                            ->OrderBy('created_at', 'desc')
                            ->paginate(10);
        }

        return view('admin.users.psikolog-allActivity', compact('list', 'psikolog'));
    }

    public function claim() {
        $this->validate(request(), [
            'poin' => 'required|digits_between:2,5',
            'rek' => 'required',
            'bank' => 'required',
            'phone' => 'required'
        ],[
            'poin.required' => 'Tentukan jumlah poin yang akan dikonversi!',
            'poin.digits_between' => 'Minimal 10 poin untuk dikonversi!',
            'rek.required' => 'Nomor rekening harus diisi!',
            'bank.required' => 'Nama bank harus diisi!',
            'phone.required' => 'Nomor telepon harus diisi!'
        ]);

        $point = request()->poin;
        $amount = request()->amount;
        $rekening = request()->rek;
        $bank = request()->bank;
        $phone = request()->phone;
        $name = auth()->user()->name;

        $int = (int) $point;

        if(auth()->user()->points < $int) {
            return redirect()->route('psikolog.activity')->with('error', 'Maaf, poin kamu kurang. Silahkan kumpulkan terlebih dahulu.');
        }

        $sisa = auth()->user()->points - $point;
        auth()->user()->points = $sisa;

        auth()->user()->save();

        \Mail::to('moderator@ex.com')->send(new CP($name, $rekening, $amount, $bank, $phone));

        return redirect()->route('psikolog.activity')->with('success', 'Data klaim poin kamu sukses dikirim kepada admin!');
    }

    public function topUp() {
        $id = request()->uid;
        $point = request()->poin;

        // FIND USER
        $user = User::find($id);

        $curr = $user->points;
        $user->points = $curr + $point;

        $user->save();

        // SAVE IN LOG
        $act = new Activity();

        $act->user_id = $user->id;
        $act->activity = "Bonus poin dari Admin";
        $act->notes = "Poin +".$point;

        $act->save();

        $user->notify(new PointBonus($user, $point));

        return redirect()->route('psikolog.allActivity')->with('success', 'Poin '.$user->name.' sebanyak '.$point.' sukses ditambahkan!');
    }
}