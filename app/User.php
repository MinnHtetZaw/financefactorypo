<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use App\LinkedSocialAccount;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    protected $guarded = [];
    
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone','contact_phone', 'email', 'password','provider','email_verified_at','work_site_id','regional_id'
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


    public function linkedSocialAccounts(){

        return $this->hasMany(LinkedSocialAccount::class);
    }

    public function verifyUser(){

        return $this->hasOne('App\VerifyUser');
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role_name) {
        foreach ($this->roles as $role) {
            if ($role->name == $role_name) {
                return true;
            }
        }
        return false;
    }   
    public function isOwner($ownerstatus) {
        foreach ($this->roles as $role) {
            if ($role->ownerstatus == $ownerstatus) {
                return true;
            }
        }
        return false;
    }   

    public function assignRole($role) {
        return $this->roles()->attach($role);
    }

    public function removeRole($role) {
        return $this->roles->detach($role);
    }

    public function hospitalorclinic($status) {
        foreach ($this->roles as $role) {
            if ($role->status == $status) {
                return true;
            }
        }
        return false;
    }   

}
