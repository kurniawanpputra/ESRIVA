<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $table = 'login_logs';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
