<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyLanguage extends Model
{
    public function StudyRecord()
    {
        return $this->belongsTo(StudyRecord::class);
    }
}
