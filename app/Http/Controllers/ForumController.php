<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function create() {
        if(auth()->user()->roles != 1) {
            session()->flash('error', 'Tidak punya akses untuk membuat forum!');

            return redirect()->route('forum.list');
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
        $forum->user_id = auth()->user()->id;

        $forum->save();

        session()->flash('success', 'Forum berhasil dibuat!');

        return redirect()->route('forum.list');
    }

    public function index() {
        $forums = new Forum();

        if(request()->status != NULL) {
            if(request()->status == 0) {
                $forums = $forums->where('is_closed', 0);
            } else {
                $forums = $forums->where('is_closed', 1);
            }
        }

        if(!empty(request()->judul)) {
            $forums = $forums->where('title', 'LIKE', '%'.request()->judul.'%');
        }
            
        $forums = $forums->OrderBy('created_at', 'desc')
                         ->get();

        return view('admin.forums.forum-list', compact('forums'));
    }

    public function close($id) {
        $forum = Forum::find($id);

        if($forum->is_closed == 1) {
            session()->flash('error', 'Forum sudah ditutup!');
            return redirect()->back();
        }

        $forum->is_closed = 1;
        $forum->save();

        session()->flash('success', 'Forum berhasil ditutup!');
        
        return redirect()->route('forum.list');
    }

    public function open($id) {
        $forum = Forum::find($id);

        if($forum->is_closed == 0) {
            session()->flash('error', 'Forum sudah dibuka!');
            return redirect()->back();
        }

        $forum->is_closed = 0;
        $forum->save();

        session()->flash('success', 'Forum berhasil dibuka!');

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
        ],[
            'title.required' => 'Judul tidak boleh kosong!',
            'body.required' => 'Konten tidak boleh kosong!'
        ]);

        $forum = Forum::find($id);

        $forum->title = request()->title;
        $forum->body = request()->body;
        $forum->save();

        session()->flash('success', 'Forum berhasil diubah!');

        return redirect()->route('forum.list');
    }

    public function detail($id) {
        $forum = Forum::find($id);

        $views = $forum->views;
        $forum->views = $views + 1;
        $forum->save();

        return view('admin.forums.view-forum', compact('forum'));
    }
}
