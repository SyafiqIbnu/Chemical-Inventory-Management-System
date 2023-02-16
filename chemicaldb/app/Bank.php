<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Bank extends Model
{
	protected $table   = 'banks';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}