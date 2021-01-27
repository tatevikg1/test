<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use  Notifiable;


    protected $fillable = ['name', 'email', 'password'];


    protected $hidden = ['password', 'remember_token'];


    protected $casts = ['email_verified_at' => 'datetime',];


    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

}
