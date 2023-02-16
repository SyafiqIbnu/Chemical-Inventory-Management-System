<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class PermissionGroup extends Model
{
    //use Cachable;
	protected $table   = 'permission_groups';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}