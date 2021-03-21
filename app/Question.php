<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @var int $id
 * @var int $topic_id 
 * @var string $question 
 * @var int $point 
*/
class Question extends Model
{
    protected $guarded = [];

    /**
     * Returns the topic  question belongs to.
    */
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
