<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class BookingCargo extends Model
{
	protected $table   = 'booking_cargos';
	protected $guarded =['urlReturn'];
    public $incrementing = false;

	public function cargoType(){
        return $this->belongsTo('App\CargoType','cargo_type','id');
    }
}