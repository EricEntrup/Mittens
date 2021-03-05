<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
 implements HasMedia
{
    use Notifiable, HasRoles ,HasMediaTrait;

    // protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type' , 'address' ,'contact_number' ,'email_verified_at', 'remember_token' ,'gender'
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

    protected static function boot()
    {
        parent::boot();

        static::created(function($user) {
            $user->assignRole('user');
        });
    }

    // public function userProfile() {
    //     return $this->hasOne(UserProfile::class, 'user_id', 'id');
    // }

    public function appointment(){
        return $this->hasMany(Appointment::class,'user_id','id');
    }

    // public function user_role()
    // {
    //     return $this->hasOneThrough('App\Role', 'App\RoleUser','role_id','id','id','user_id')->withDefault([
    //         'name' => ''
    //     ]);
    // }

    // public function is($roleName)
    // {
    //     $role = $this->user_role;
    //     if(isset($role))
    //     {
    //         if ($role->name == $roleName)
    //         {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
}
