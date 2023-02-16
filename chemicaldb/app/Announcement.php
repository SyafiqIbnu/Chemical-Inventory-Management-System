<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class Announcement extends Model
{
    use Cachable;
	protected $table   = 'announcements';
	protected $guarded =['urlReturn'];
        public $incrementing = false;
}