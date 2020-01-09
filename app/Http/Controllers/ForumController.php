<?php

namespace App\Http\Controllers;

use App\Forum;
use App\User;
use Carbon\Carbon;
use App\ForumComments as FC;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function create() {
        if(auth()->user()->roles != 1) {
            session()->flash('error', 'Tidak punya akses untuk membuat forum!');

            return redirect()->route('forum.list');
        }

        $user = auth()->user();

        if(count($user->memberships) > 0) {
            if($user->memberships->last()->expired < Carbon::now()) {
                $forums = Forum::where('user_id', auth()->user()->id)
                       ->where('is_closed', 0)
                       ->get()
                       ->count();
        
                if($forums > 0) {
                    session()->flash('error', 'Kamu hanya bisa memiliki 1 forum aktif, harap tutup salah satu sebelum membuat baru!');

                    return redirect()->route('forum.list');
                }
            }
        }elseif(count($user->memberships) == 0) {
            $forums = Forum::where('user_id', auth()->user()->id)
                       ->where('is_closed', 0)
                       ->get()
                       ->count();
        
            if($forums > 0) {
                session()->flash('error', 'Kamu hanya bisa memiliki 1 forum aktif, harap tutup salah satu sebelum membuat baru!');

                return redirect()->route('forum.list');
            }
        }

        return view('admin.forums.add-forum');
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ],[
            'title.required' => 'Judul tidak boleh kosong!',
            'body.required' => 'Konten tidak boleh kosong!'
        ]);

        $forum = new Forum();

        $forum->title = request()->title;
        $forum->body = request()->body;
        $forum->type = request()->type;
        $forum->user_id = auth()->user()->id;

        $forum->save();

        session()->flash('success', 'Forum berhasil dibuat!');

        return redirect()->route('forum.list');
    }

    public function index() {
        $forums = new Forum();

        $forums = $forums->join('users', 'users.id', 'forums.user_id')
                         ->select('forums.*', 'users.name');

        if(request()->status != NULL) {
            if(request()->status == 0) {
                $forums = $forums->where('is_closed', 0);
            } else {
                $forums = $forums->where('is_closed', 1);
            }
        }

        if(!empty(request()->judul)) {
            $forums = $forums->where('title', 'LIKE', '%'.request()->judul.'%')
                             ->orWhere('users.name', 'LIKE', '%'.request()->judul.'%');
        }

        if(auth()->user()->roles != 3) {
            $forums = $forums->where('is_show', 1);
        }
            
        $forums = $forums->OrderBy('created_at', 'desc')
                         ->get();

        return view('admin.forums.forum-list', compact('forums'));
    }

    public function myForums() {
        if(auth()->user()->roles != 1) {
            session()->flash('error', 'Menu ini hanya tersedia untuk non-admin dan non-psikolog!');
            return redirect()->back();
        }

        $forums = Forum::where('user_id', auth()->user()->id)
                        ->OrderBy('created_at', 'desc')
                        ->get();

        return view('admin.forums.my-forum', compact('forums'));
    }

    public function close($id) {
        if(auth()->user()->roles == 3) {
            session()->flash('error', 'Hanya pengguna atau psikolog yang dapat menutup forum!');
            return redirect()->back();
        }

        $forum = Forum::find($id);

        if(auth()->user()->id != $forum->user_id) {
            if(auth()->user()->roles == 2) {
                // DO NOTHING
            }else{
                session()->flash('error', 'Tidak bisa membuka atau menutup forum orang lain!');
                return redirect()->back();
            }
        }

        if($forum->is_closed == 1) {
            session()->flash('error', 'Forum sudah ditutup!');
            return redirect()->back();
        }

        $forum->is_closed = 1;
        $forum->save();

        session()->flash('success', 'Forum berhasil ditutup!');
        
        return redirect()->back();
    }

    public function open($id) {
        if(auth()->user()->roles == 3) {
            session()->flash('error', 'Hanya pengguna atau psikolog yang dapat membuka forum!');
            return redirect()->back();
        }

        $forums = Forum::where('user_id', auth()->user()->id)
                       ->where('is_closed', 0)
                       ->get()
                       ->count();
        
        if($forums > 0) {
            session()->flash('error', 'Kamu hanya bisa memiliki 1 forum aktif, harap tutup forum lain sebelum membuka forum ini!');

            return redirect()->back();
        }

        $forum = Forum::find($id);

        if(auth()->user()->id != $forum->user_id) {
            if(auth()->user()->roles == 2) {
                // DO NOTHING
            }else{
                session()->flash('error', 'Tidak bisa membuka atau menutup forum orang lain!');
                return redirect()->back();
            }
        }

        if($forum->is_closed == 0) {
            session()->flash('error', 'Forum sudah dibuka!');
            return redirect()->back();
        }

        $forum->is_closed = 0;
        $forum->save();

        session()->flash('success', 'Forum berhasil dibuka!');

        return redirect()->back();
    }

    public function hide($id) {
        $forum = Forum::find($id);

        if($forum->is_show == 0) {
            session()->flash('error', 'Forum sudah disembunyikan!');
            return redirect()->back();
        }

        $forum->is_show = 0;
        
        $forum->save();

        session()->flash('success', 'Forum berhasil disembunyikan!');
        
        return redirect()->route('forum.list');
    }

    public function show($id) {
        $forum = Forum::find($id);

        if($forum->is_show == 1) {
            session()->flash('error', 'Forum sudah ditampilkan!');
            return redirect()->back();
        }

        $forum->is_show = 1;

        $forum->save();

        session()->flash('success', 'Forum berhasil ditampilkan!');

        return redirect()->route('forum.list');
    }

    public function edit($id) {
        $forum = Forum::find($id);

        if(auth()->user()->id != $forum->user_id) {
            if(auth()->user()->roles == 3) {
                return view('admin.forums.edit-forum', compact('forum'));
            }
            session()->flash('error', 'Tidak bisa mengubah forum pengguna lain!'); 
            
            return redirect()->back();
        }

        return view('admin.forums.edit-forum', compact('forum'));
    }

    public function update($id) {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ],
        [
            'title.required' => 'Judul tidak boleh kosong!',
            'body.required' => 'Konten tidak boleh kosong!'
        ]);

        $forum = Forum::find($id);

        $forum->title = request()->title;
        $forum->body = request()->body;

        $forum->save();

        session()->flash('success', 'Forum berhasil diubah!');

        return redirect()->back();
    }

    public function detail($id) {
        $forum = Forum::find($id);

        if($forum->type == "Privat") {
            if(auth()->user()->id != $forum->user_id) {
                if(auth()->user()->roles == 2) {
                    $comments = FC::where('forum_id', $id)->paginate(10);

                    $views = $forum->views;
                    $forum->views = $views + 1;

                    $forum->save();

                    return view('admin.forums.view-forum', compact('forum', 'comments'));
                }

                session()->flash('error', 'Forum privat hanya bisa diakses pembuat forum dan psikolog!'); 
            
                return redirect()->back();
            }
        }

        $comments = FC::where('forum_id', $id)->paginate(10);

        $views = $forum->views;
        $forum->views = $views + 1;

        $forum->save();

        return view('admin.forums.view-forum', compact('forum', 'comments'));
    }
}
