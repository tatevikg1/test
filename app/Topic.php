<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Topic extends Model
{

    protected $guarded = [];


    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
