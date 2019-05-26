<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_id', 'email', 'password', 'photo'
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

    /**
     * This is a method from the relationship with the Role
     * 
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles))
        {
            return true;
        }
        abort(403, 'This action is not authorized.');
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach($roles as $role)
            {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if($this->role->description === $role){
            return true;
        }
        return false;
    }

     /**
     * Get the periods for the user.
     */
    public function periods()
    {
        return $this->hasMany('App\Period');
    }

    public function scopeActive($query, $flag)
    {
        return $query->where('status', $flag);
    }

}
