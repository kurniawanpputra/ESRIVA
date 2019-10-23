<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function feedbacks() {
        return $this->hasMany(Feedback::class);
    }

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function forums() {
        return $this->hasMany(Forum::class);
    }

    public function comments() {
        return $this->hasMany(ForumComments::class);
    }
    
    public function last_login() {
        return $this->hasMany(LoginLog::class);
    }

    public function memberships() {
        return $this->hasMany(Membership::class);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }
}
