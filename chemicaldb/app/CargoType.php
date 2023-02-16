<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class CargoType extends Model
{
	protected $table   = 'cargo_types';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}