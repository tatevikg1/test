<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class QuestionsOption extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function question()
    {
        return $this->belongsTo(Question::class)->withTrashed();
    }

}
