<?php

namespace App\Classes;

class ValueLabelHelper {

	public static function getYesNoLabel($value){
		$data['V1']=__('general.yes');
		$data['V2']=__('general.no');
		return $data['V'.$value];
	}

	public static function getActiveLabel($value){
		$data['V1']=__('general.active');
		$data['V2']=__('general.inactive');
		return $data['V'.$value];
	}
}