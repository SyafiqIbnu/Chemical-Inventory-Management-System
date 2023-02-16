<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Branch extends Model
{
	protected $table   = 'branches';
	protected $guarded =['urlReturn'];
	public $incrementing = false;
	
	public function state(){
        return $this->belongsTo('App\State','state_id','id');
    }

}