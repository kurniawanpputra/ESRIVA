<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use Carbon\Carbon;
use App\Mail\ClaimPoints as CP;
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

        return view('admin.users.psikolog-allActivity', compact('list'));
    }

    public function claim() {
        dd("Belum jadi!");
    }
}
