<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    
    /**
     * This is a method from the relationship with the User
     * 
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
