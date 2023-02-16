<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Products extends Model
{

	protected $table   = 'products';
	protected $guarded =['urlReturn'];
    public $incrementing = false;

	public function producttype(){
        return $this->belongsTo('App\ProductType','product_type','id');
    }
	public function productcategory(){
        return $this->belongsTo('App\ProductCategory','product_category','id');
    }
    public function foodgroup(){
        return $this->belongsTo('App\FoodGroup','food_group','id');
    }

    public function orders(){

        return $this->belongToMany(Order::class);
    }
}