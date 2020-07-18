<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Result extends Model
{
    use SoftDeletes;

    protected $fillable = ['correct', 'date', 'user_id', 'question_id'];


    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function question()
    {
        return $this->belongsTo(Question::class)->withTrashed();
    }

}
