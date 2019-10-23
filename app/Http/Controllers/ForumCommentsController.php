<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumComments as Comment;
use App\ReportLog as Log;
use App\Forum;
use App\Activity;
use App\Notifications\ForumReply;

class ForumCommentsController extends Controller
{
    public function store($id) {
        $comment = New Comment();

        $comment->forum_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->body = request()->comment;

        $comment->save();

        if(auth()->user()->roles == 2) {
            auth()->user()->points += 5;
            auth()->user()->save();
        }

        $forum = Forum::find($id);
        $forum->user->notify(new ForumReply($forum));

        if(auth()->user()->roles == 2) {
            $activity = new Activity();

            $activity->user_id = auth()->user()->id;
            $activity->activity = "Membuat komentar";
            $activity->notes = "Poin +5";

            $activity->save();
        }

        session()->flash('success', 'Komentar berhasil ditambahkan!');
        return redirect()->back();
    }

    public function report($fid, $cid) {
        if(auth()->user()->roles == 3) {
            session()->flash('error', 'Admin tidak bisa mereport komentar!');

            return redirect()->back();
        }

        $log = new Log();

        $log->forum_id = $fid;
        $log->comment_id = $cid;
        $log->pelapor = request()->pelapor;
        $log->dilapor = request()->dilapor;
        $log->kategori = request()->kategori;

        $log->save();

        session()->flash('success', 'Komentar berhasil dilaporkan!');
        return redirect()->back();
    }

    public function reportIndex() {
        $logs = Log::OrderBy('created_at', 'desc')->get();

        return view('admin.report-logs', compact('logs'));
    }

    public function open($id) {
        $comment = Comment::find($id);

        if($comment->abuse == 0) {
            session()->flash('error', 'Komentar sudah dibuka!');
            return redirect()->back();
        }

        $comment->abuse = 0;
        $comment->save();

        session()->flash('success', 'Komentar sukses dibuka!');
        return redirect()->route('report.index');
    }

    public function close($id) {
        $comment = Comment::find($id);

        if($comment->abuse == 1) {
            session()->flash('error', 'Komentar sudah ditutup!');
            return redirect()->back();
        }

        $comment->abuse = 1;
        $comment->save();

        session()->flash('success', 'Komentar sukses ditutup!');
        return redirect()->route('report.index');
    }
}
