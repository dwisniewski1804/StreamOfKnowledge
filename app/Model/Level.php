<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    	public function users()
    {
        return $this->hasMany('App\Model\User','level_id');
    }
//    	public function questions()
//    {
//        return $this->hasMany('App\Model\Question','level_id');
//    }
      	public function schoolSubjects()
    {
        return $this->belongsToMany('App\Model\SchoolSubject');
    }
}
