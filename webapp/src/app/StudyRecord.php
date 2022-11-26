<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyRecord extends Model
{
    public function studyLanguages()
    {
        return $this->hasMany(StudyLanguage::class);
    }
    public function studyContents()
    {
        return $this->hasMany(StudyContent::class);
    }
}
