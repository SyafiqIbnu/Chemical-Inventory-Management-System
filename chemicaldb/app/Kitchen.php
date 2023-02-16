<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Kitchen extends Model
{
	protected $table   = 'kitchens';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}