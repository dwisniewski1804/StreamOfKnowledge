<?php

namespace App;

use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

class User extends Authenticatable {

    use Notifiable;
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPasswordNotification($token));
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    	public function questions()
    {
        return $this->hasMany('App\Model\Question', 'user_id');
    }
     	public function answers()
    {
        return $this->hasMany('App\Model\Answer', 'user_id');
    }
      public function level() {
        return $this->belongsTo('App\Model\Level');
    }
}
