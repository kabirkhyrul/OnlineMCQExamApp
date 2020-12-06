<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $guarded = ['_token'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}