<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'address',
        'town',
        'state',
        'country',
        'pin',
        'profile_pic',
        'device_type',
        'google_token',
        'facebook_token',
        'token'
    ];
}
