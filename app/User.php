<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name','last_name','address', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function sponsors() {
        return $this->belongsToMany('App\Sponsor');
    }

    public function specializations() {
        return $this->belongsToMany('App\Specialization');
    }

    public function messages() {
        return $this->belongsToMany('App\Message');
    }

    public function reviews() {
        return $this->belongsToMany('App\Review');
    }
}
