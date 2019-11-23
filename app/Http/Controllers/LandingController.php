<?php

namespace App\Http\Controllers;

use App\Article;
use App\Message;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $articles = Article::where('status', 'Approved')
                            ->OrderBy('views', 'desc')
                            ->take(3)
                            ->get();

        return view('index', compact('articles'));
    }

    public function message() {
        $ip_address = gethostbyname(trim(exec("hostname")));

        $data = new Message();

        $data->name = request()->name;
        $data->email = request()->email;
        $data->phone = request()->phone;
        $data->msg = request()->msg;
        $data->ip = $ip_address;

        $data->save();

        session()->flash('success', 'Pesan kamu berhasil dikirim, terima kasih '.request()->name.'.');
        return redirect('/#contact');
    }

    public function messageList() {
        $messages = Message::OrderBy('created_at', 'desc')->paginate(10);

        return view('admin.feedbacks.messages', compact('messages'));
    }
}
