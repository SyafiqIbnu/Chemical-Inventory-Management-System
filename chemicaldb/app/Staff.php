<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Staff extends Model
{
	protected $table   = 'staffs';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}