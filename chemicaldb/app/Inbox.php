<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Inbox extends Model
{
	protected $table   = 'inboxes';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}