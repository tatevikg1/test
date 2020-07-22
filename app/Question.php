<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    protected $guarded = [];


    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function questions_options()
    {
        return $this->hasMany(QuestionsOption::class);
    }

    public function testAnswers()
    {
        return $this->hasMany(TestAnswer::class);
    }
}
