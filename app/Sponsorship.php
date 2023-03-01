<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'user_id',
        'sponsor_id',
        'start_date',
        'expiration_date',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sponsor()
    {
        return $this->belongsTo('App\Sponsor');
    }
}
