<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password','role','dob','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAgeAttribute() {
        $dob=Carbon::parse($this->dob);
        return $dob->diffInYears(Carbon::now());
    }

    public function rolename()
    {
        return $this->hasOne("App\Role", 'id', "role");
    }
     public function timereads()
    {
        return $this->hasMany("App\TimeRead", 'user_id', "id");
    }
     public function linereads()
    {
        return $this->hasMany("App\LineRead", 'user_id', "id");
    }
    public function  transactions(){
        return $this->hasMany("App\Transaction", 'user_id', "id");   
    }
}
