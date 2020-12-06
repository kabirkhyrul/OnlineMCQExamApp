<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['_token'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function question()
    {
        return $this->hasMany(QuestionBank::class);
    }

    public function exam_settings()
    {
        return $this->hasOne(ExamSetting::class);
    }
}