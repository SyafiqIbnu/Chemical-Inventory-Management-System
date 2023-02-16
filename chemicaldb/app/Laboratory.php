<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Laboratory extends Model
{
	protected $table   = 'laboratories';
	protected $guarded =['urlReturn'];
    public $incrementing = true;

	public function getFaculty(){
        return $this->belongsTo('App\Faculty','faculty','id');
    }
	public function getType(){
        return $this->belongsTo('App\LaboratoryType','type','id');
    }
}