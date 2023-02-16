<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class FoodGroup extends Model
{
	protected $table   = 'food_groups';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}