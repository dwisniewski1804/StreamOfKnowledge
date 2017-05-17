<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    	public function schoolSubject()
    {
        return $this->belongsTo('App\Model\SchoolSubject');
    }
     public function questions() {
        return $this->hasMany('App\Model\Question', 'section_id');
    }
}
