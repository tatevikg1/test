<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @var int $id
 * @var string $name 
 * @var string $email 
 * @var string $password 
 * @var bool $admin 
*/
class User extends Authenticatable implements MustVerifyEmail
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
