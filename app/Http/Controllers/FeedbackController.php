<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Notifications\FeedbackDone;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index() {
        $feedbacks = Feedback::OrderBy('created_at', 'desc')->paginate(10);

        return view('admin.feedbacks.feedback-list', compact('feedbacks'));
    }

    public function finished($id) {
        $feedback = Feedback::find($id);

        if($feedback->type != "Keluhan") {
            session()->flash('error', 'Umpan balik selain keluhan tidak bisa ditandai!');
            return redirect()->back();
        }

        if($feedback->is_finished == 1) {
            session()->flash('error', 'Umpan balik sudah ditandai selesai!');
            return redirect()->back();
        }

        $feedback->is_finished = 1;
        $feedback->save();

        $feedback->user->notify(new FeedbackDone($feedback));

        session()->flash('success', 'Umpan balik sukses ditandai selesai!');
        return redirect()->route('feedback.list');
    }

    public function unfinished($id) {
        $feedback = Feedback::find($id);

        if($feedback->type != "Keluhan") {
            session()->flash('error', 'Umpan balik selain keluhan tidak bisa ditandai!');
            return redirect()->back();
        }

        if($feedback->is_finished == 0) {
            session()->flash('error', 'Umpan balik sudah ditandai belum selesai!');
            return redirect()->back();
        }

        $feedback->is_finished = 0;
        $feedback->save();

        session()->flash('success', 'Umpan balik sukses ditandai belum selesai!');
        return redirect()->route('feedback.list');
    }

    public function create() {
        if(auth()->user()->roles == 3) {
            session()->flash('success', 'Admin tidak bias membuat feedback!');
            return redirect()->route('feedback.list');
        }

        return view('admin.feedbacks.add-feedback');
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ], [
            'title.required' => 'Judul tidak boleh kosong!',
            'body.required' => 'Konten tidak boleh kosong!'
        ]);

        $feedback = new Feedback();

        $feedback->title = request()->title;
        $feedback->body = request()->body;
        $feedback->type = request()->type;
        $feedback->user_id = auth()->user()->id;

        $feedback->save();

        if (request()->type == "Keluhan") {
            session()->flash('success', 'Umpan balik sukses dikirm! Akan diproses Admin dalam 2x24 jam.');
        } else {
            session()->flash('success', 'Umpan balik sukses dikirm! Terima kasih atas saran dan masukannya.');
        }

        return redirect()->back();
    }
}
