<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsOption extends Model
{
    protected $guarded = [];


    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function testAnswers()
    {
        return $this->belongsToMany(TestAnswer::class);
    }

}
