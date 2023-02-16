<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class OrderProduct extends Model
{
	protected $table   = 'order_products';
	protected $guarded =['urlReturn'];
    //public $incrementing = false;

	public function product(){
        return $this->belongsTo('App\Products','product_id','id');
    }
}