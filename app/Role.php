<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [];
    protected $guarded = [];
   
    public function user()
    {
        return $this->hasOne("App\User", 'role', "id");
    }
   

}