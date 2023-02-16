<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Location extends Model
{
	protected $table   = 'locations';
	protected $guarded =['urlReturn'];
    public $incrementing = false;

	public function state(){
        return $this->belongsTo('App\State','state_id','id');
    }

	public function kitchen(){
        return $this->belongsTo('App\Kitchen','kitchen_id','id');
    }
}