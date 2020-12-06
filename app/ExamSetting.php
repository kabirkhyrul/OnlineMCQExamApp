<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSetting extends Model
{
    protected $guarded = ['_token'];

    protected $hidden = ['created_at', 'updated_at'];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}