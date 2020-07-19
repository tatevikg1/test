<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Test extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function topic()
    {
        return $this->belongsTo(Topic::class)->withTrashed();
    }

    public function testAnswers()
    {
        return $this->hasMany(TestAnswer::class)->withTrashed();
    }

    public function user()
    {
        return $this->belogsTo(User::class)->withTrashed();
    }
}
