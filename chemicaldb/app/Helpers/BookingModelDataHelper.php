<?php
namespace App\Helpers;

use \App\User;
use Auth;
use DB;

class BookingModelDataHelper{

    public static function getBookingStatusOfficeApproval(){
        return 2;
    }

    public static function getBookingStatusVehicleSearch(){
        return 3;
    }

    public static function getBookingStatusDriverSearch(){
        return 4;
    }

    public static function  getBookingStatusDriver1Confirmation()
    {
        return 5;
    }
    
    public static function getBookingStatusDriver2Confirmation(){
        return 6;
    }
    
    public static function getBookingStatusActive(){
		return 7;
    }
    
    public static function getBookingStatusOnGoing(){
		return 8;
    }
    
    public static function getBookingStatusCompleted(){
		return 9;
	}

	public static function getBookingStatusRejected(){
		return 99;
	}


    public static function setBookingStatusOfficeApproval(&$modelBooking){
		$modelBooking->booking_status_id=self::getBookingStatusOfficeApproval();
	}

	public static function setBookingStatusVehicleSearch(&$modelBooking){
		$modelBooking->booking_status_id=self::getBookingStatusVehicleSearch();
	}

	public static function setBookingStatusDriverSearch(&$modelBooking){
		$modelBooking->booking_status_id=self::getBookingStatusDriverSearch();
	}

	public static function setBookingStatusDriver1Confirmation(&$modelBooking){
		$modelBooking->booking_status_id=self::getBookingStatusDriver1Confirmation();
	}

	public static function setBookingStatusDriver2Confirmation(&$modelBooking){
		$modelBooking->booking_status_id=self::getBookingStatusDriver2Confirmation();
	}

	public static function setBookingStatusActive(&$modelBooking){
		$modelBooking->booking_status_id=self::getBookingStatusActive();
	}

	public static function setBookingStatusRejected(&$modelBooking){
		$modelBooking->booking_status_id=self::getBookingStatusRejected();
	}


    public static function setBookingStatusOnGoing(&$modelBooking){
        $modelBooking->booking_status_id=self::getBookingStatusOnGoing();
    }
    
    public static function setBookingStatusCompleted(&$modelBooking){
        $modelBooking->booking_status_id=self::getBookingStatusCompleted();
	}
}