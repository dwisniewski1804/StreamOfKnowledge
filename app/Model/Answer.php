<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

    protected $table = 'answers';
    // protected $primaryKey = 'id';
    // protected $guarded = [];
    // protected $hidden = ['id'];
    protected $fillable = ['tittle', 'content', 'is_accepted', 'is_helpful'];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }
     public function question() {
        return $this->belongsTo('App\Model\Question');
    }

}
