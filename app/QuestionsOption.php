<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @var int $id
 * @var int $question_id 
 * @var string $option 
 * @var bool $correct 
*/
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
