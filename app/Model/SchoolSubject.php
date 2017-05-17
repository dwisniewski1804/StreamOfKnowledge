<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SchoolSubject extends Model {

    public function levels() {
        return $this->belongsToMany('App\Model\Level', 'level_school_subject', 'school_subject_id', 'level_id');
    }
     	public function sections()
    {
        return $this->hasMany('App\Model\Section');
    }
}
