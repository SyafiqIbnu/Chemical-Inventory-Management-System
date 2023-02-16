<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
	use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'roles','password_confirm','password','branch_name','state_id','actual_link'
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

	public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function userType()
    {
        return $this->hasOne('App\UserType','id','user_type_id');
    }

    public function account_holder()
    {
        return $this->hasOne('App\AccountHolder','id','account_holder_id');
    }

   

    public function upline(){
        return $this->hasOne('App\User','id','upline_id');
    }

    public function location(){
        return $this->hasOne('App\Location','id','location_id');
    }

    public function kitchen(){
        return $this->hasOne('App\Kitchen','id','kitchen_id');
    }


}
