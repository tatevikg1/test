<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    use SoftDeletes;

    protected $fillable = ['question', 'topic_id'];


    public function setTopicIdAttribute($input)
    {
        $this->attributes['topic_id'] = $input ? $input : null;
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class)->withTrashed();
    }

    public function questions_options()
    {
        return $this->hasMany(QuestionsOption::class)->withTrashed();
    }
}
