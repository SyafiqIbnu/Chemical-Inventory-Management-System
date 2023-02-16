<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class BookingApplication extends Model
{
	protected $table   = 'booking_applications';
	protected $guarded =['urlReturn'];
    //public $incrementing = false;
}