<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class BookingVehicle extends Model
{
	protected $table   = 'booking_vehicles';
	protected $guarded =['urlReturn'];
    //public $incrementing = false;

	public function vehicleType(){
        return $this->belongsTo('App\VehicleType','vehicle_type_id','id');
    }
}