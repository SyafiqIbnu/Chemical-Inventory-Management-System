<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class OrderStatu extends Model
{
	protected $table   = 'order_status';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}