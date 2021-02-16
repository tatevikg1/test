<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @var int $id
 * @var int $test_id 
 * @var int $question_id 
 * @var int $correct 
 * @var int $question_option_id 
*/
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
