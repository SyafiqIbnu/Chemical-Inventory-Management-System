<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class LaboratoryType extends Model
{
	protected $table   = 'laboratory_types';
	protected $guarded =['urlReturn'];
    public $incrementing = true;
}