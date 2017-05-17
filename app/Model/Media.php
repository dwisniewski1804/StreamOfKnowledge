<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

        protected $fillable = ['name', 'path','type'];
    public function mediaType() {
        return $this->belongsTo('App\Model\MediaType');
    }
    public function answer() {
        return $this->belongsTo('App\Model\Answer');
    }
    public function question() {
        return $this->belongsTo('App\Model\Question');
    }    
}
