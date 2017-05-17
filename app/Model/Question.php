<?php

namespace App\Model;

use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

class Question extends Model {

    use CrudTrait;

    /*
      |--------------------------------------------------------------------------
      | GLOBAL VARIABLES
      |--------------------------------------------------------------------------
     */

    protected $table = 'questions';
    // protected $primaryKey = 'id';
    // protected $guarded = [];
    // protected $hidden = ['id'];
    protected $fillable = ['tittle', 'content'];
    public $timestamps = true;

    /*
      |--------------------------------------------------------------------------
      | FUNCTIONS
      |--------------------------------------------------------------------------
     */

    /*
      |--------------------------------------------------------------------------
      | RELATIONS
      |--------------------------------------------------------------------------
     */



    /*
      |--------------------------------------------------------------------------
      | SCOPES
      |--------------------------------------------------------------------------
     */

    /*
      |--------------------------------------------------------------------------
      | ACCESORS
      |--------------------------------------------------------------------------
     */

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function answers() {
        return $this->hasMany('App\Model\Answer', 'question_id');
    }
    public function medias() {
        return $this->hasMany('App\Model\Media', 'question_id');
    }
    public function section() {
        return $this->belongsTo('App\Model\Section');
    }

//    public function level() {
//        return $this->belongsTo('App\Model\Level');
//    }

    /*
      |--------------------------------------------------------------------------
      | MUTATORS
      |--------------------------------------------------------------------------
     */
}
