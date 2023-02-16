<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    
	protected $table   = 'orders';
	protected $guarded =['urlReturn','user_id'];
    //public $incrementing = false;

	public function linkeduser(){
        return $this->belongsTo('App\User','linked_user','id');
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function orderstatus(){
        return $this->belongsTo('App\OrderStatu','status','id');
    }

    public function createdby(){
        return $this->belongsTo('App\User','created_by','id');
    }
}