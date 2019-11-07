<?php

namespace App\Http\Controllers;

use App\Article;
use App\Message;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $articles = Article::where('status', 'Approved')
                            ->OrderBy('created_at', 'desc')
                            ->take(3)
                            ->get();

        return view('index', compact('articles'));
    }

    public function message() {
        $data = new Message();

        $data->name = request()->name;
        $data->email = request()->email;
        $data->phone = request()->phone;
        $data->msg = request()->msg;

        $data->save();

        session()->flash('success', 'Pesan berhasil dikirim!');
        return redirect('/#message-sent');
    }
}
