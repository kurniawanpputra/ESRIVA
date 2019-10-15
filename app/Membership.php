<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'memberships';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
