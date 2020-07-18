<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Topic extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];


    public function questions()
    {
        return $this->hasMany(Question::class)->withTrashed();
    }
}
