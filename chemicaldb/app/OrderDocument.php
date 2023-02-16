<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class OrderDocument extends Model
{
	protected $table   = 'order_documents';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}