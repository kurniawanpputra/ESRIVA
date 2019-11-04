<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\LoginLog;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout() {
        $user = auth()->user();
        $user->online = 0;
        $user->save();

        auth()->logout();
        session()->invalidate();

        return redirect('login');
    }

    public function login() {
        if(empty(request()->email)) {
            session()->flash('error', 'E-Mail tidak boleh kosong!');
            return redirect()->back();
        }
        
        $user = User::where('email','=',request()->email)->first();

        if(!isset($user)) {
            session()->flash('error', 'Pengguna tidak ditemukan!');
            return redirect()->back();
        }

        if($user->is_banned == 1) {
            session()->flash('error', 'Silahkan kontak admin agar bisa kembali mendapatkan akses.');
            return redirect()->back();
        }

        auth()->attempt(['email' => request('email'), 'password' => request('password')]);
        
        if(auth()->user()) {
            $log = new LoginLog();

            $log->user_id = auth()->user()->id;
            $log->save();

            $user = auth()->user();

            $user->online = 1;
            $user->save();

            return redirect('/home');
        }else{
            session()->flash('error', 'E-Mail atau Password yang dimasukan salah!');
            return redirect()->back();
        }
    }
}