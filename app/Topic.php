<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Topic extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function questions()
    {
        return $this->hasMany(Question::class)->withTrashed();
    }

    public function tests()
    {
        return $this->hasMany(User::class)->withTrashed();
    }
}
