<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TestAnswer extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function test()
    {
        return $this->belongsTo(Test::class)->withTrashed();
    }

    public function questionsOption()
    {
        return $this->belongsTo(QuestionsOption::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
