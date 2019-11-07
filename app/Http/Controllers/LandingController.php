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
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        else
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

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
}