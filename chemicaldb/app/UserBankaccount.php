<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class UserBankaccount extends Model
{
	protected $table   = 'user_bankaccounts';
	protected $guarded =['urlReturn'];
    public $incrementing = false;

	public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}