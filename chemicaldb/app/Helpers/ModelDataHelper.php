<?php
namespace App\Helpers;

use \App\User;
use Auth;
use DB;


class ModelDataHelper{

    /**
     * Get active label
     * @param int $value active value (1,2)
     * @return string active label
     */
    public static function getActiveLabel($value){
        $data[1]=__('general.active');
        $data[2]=__('general.inactive');

        if(isset($data[$value])){
            return $data[$value];
        }

        return "";
    }

    /**
     * Get yes/no label
     * @param int $value active value (1,2)
     * @return string active label
     */
    public static function getYesNoLabel($value){
        $data[1]=__('general.yes');
        $data[2]=__('general.no');

        if(isset($data[$value])){
            return $data[$value];
        }

        return "";
    }
    
    
    /**
     * Get vehicle model list
     * @return collection vehicle model list
     */
    public static function getSupplierModels(){
        $vehicle_id_list=null;
        $vehicle_id_list=\App\Supplier::orderBy('name','asc')
        ->where('isactive','=',1)
        ->pluck('name','id');
    
        return $vehicle_id_list;
    }

    /**
     * Get active vehicle type list
     * @return collection
     */
    public static function getActiveRoles(){
        $data_list=\App\Role::orderBy('name','asc')->pluck('name','id');
        return $data_list;
    }

       /**
     * Get branch list
     */
    public static function getBranchList($addSelectAll=false){
        $data_list=\App\Branch::orderBy('name','asc')
        ->pluck('name','id');

        if($addSelectAll){
            $data_list->prepend(__('general.all'),-1);
        }

        //dd( $data_list);
        return $data_list;
    }
 

}