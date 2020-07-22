<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TestAnswer extends Model
{

    protected $guarded = [];

    public function test()
    {
        return $this->belongsTo(Test::class);
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
