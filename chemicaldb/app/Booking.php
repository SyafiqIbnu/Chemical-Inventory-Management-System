<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
	protected $table   = 'bookings';
	protected $guarded =['urlReturn'];
    //public $incrementing = false;

	public function bookingApplication(){
        return $this->belongsTo('App\BookingApplication','booking_application_id','id');
    }

    public function vehicleType(){
        return $this->belongsTo('App\VehicleType','vehicle_type_id','id');
    }



}