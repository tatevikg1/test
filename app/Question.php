<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function topic()
    {
        return $this->belongsTo(Topic::class)->withTrashed();
    }

    public function questions_options()
    {
        return $this->hasMany(QuestionsOption::class)->withTrashed();
    }
}
