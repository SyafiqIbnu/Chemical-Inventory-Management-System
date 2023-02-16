<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Chemical extends Model
{
	protected $table   = 'chemicals';
	protected $guarded =['urlReturn'];
    public $incrementing = true;

	public function getLaboratory(){
        return $this->belongsTo('App\Laboratory','laboratory_id','id');
    }
    public function getStaff(){
        return $this->belongsTo('App\Staff','staff_id','id');
    }
    public function getFile(){
        return $this->belongsTo('App\File','item_sheet','id');
    }
    
}