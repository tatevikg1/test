<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Test extends Model
{
    protected $guarded = [];


    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function testAnswers()
    {
        return $this->hasMany(TestAnswer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
