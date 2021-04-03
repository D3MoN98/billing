<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'contact_no', 'password', 'address', 'shipping_address', 'last_login_at', 'last_login_ip',
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_users', 'user_id', 'role_id');
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first())
            return true;
        return false;
    }


    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first())
            return true;
        return false;
    }

    public function isAdmin()
    {
        if ($this->hasRole('admin'))
            return true;
        return false;
    }
}