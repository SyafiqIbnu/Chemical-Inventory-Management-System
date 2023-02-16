<?php
namespace App\Helpers;

use \App\User;
use Auth;
use DB;

class UserModelDataHelper{

    /**
     * Check user belongs to branch
     * @param $branch_id int branch id
     */
    public static function checkUserKPDNBelongsToBranch($branch_id){
        $branchId=self::getKPDNBranchId();
        if( $branchId ==null){
            return false;
        }

        $branch=Auth::user()->kpdn_branch();
        if($branch==null){
            return false;
        }
        
        if($branchId == $branch_id){
            return true;
        }

        return false;
    }

    /**
     * Check user from branch HQ
     *  @param $branch_id int branch id
     */
    public static function checkUserKPDNFromBranchHQ($branch_id){
        if(self::getUserIsKPDNHQ()){
            return false;
        }

        $branch=Auth::user()->kpdn_branch();
        if($branch==null){
            return false;
        }

        $branch2=\App\Branch::find($branch_id);
        if($branch2==null){
            return false;
        }

        if($branch->is_hq !=1){
            return false;
        }
        
        if($branch2->state_id==$branch->state_id){
            return true;            
        }

        return false;
    }

    /**
     * get user is KPDN HQ state id
     */
    public static function getUserIsKPDNHQStateId(){
        $bUserIsKKPDNHQ=self::getUserIsKPDNHQ();
        if(! $bUserIsKKPDNHQ){
            return false;
        }
        
        $branch=Auth::user()->kpdn_branch();
        if($branch==null){
            return false;
        }

        return $branch->state_id;
    }

    /**
     * get user is KPDN HQ
     */
    public static function getUserIsKPDNHQ(){
       $bUserIsKPDN=self::getUserIsKPDN();
        if(! $bUserIsKPDN){
            return false;
        }

        $branch=Auth::user()->kpdn_branch();
        if($branch==null){
            return false;
        }

        if($branch->is_hq==1){
            return true;
        }

        return true;
    }

    /**
     * get user is KPDN
     */
    public static function getUserIsKPDN(){
        return Auth::user()->user_type_id==1;
    }

    /**
     * get user is oilco
     */
    public static function getUserIsOilCo(){
        return Auth::user()->user_type_id==3;
    }

    /**
     * get user is agency
     */
    public static function getUserIsAgency(){
        return Auth::user()->user_type_id==4;
    }

    /**
     * get user is account holder
     */
    public static function getUserIsAccountHolder(){
        return Auth::user()->user_type_id==2;
    }

    

    /**
     * Get user account holder id
     */
    public static function getUserAccountHolderId(){
        if(self::getUserIsAccountHolder()){
            return Auth::user()->account_holder_id;
        }        

        return null;
    }

    /**
     * Get user agency_id
     */
    public static function getUserAgencyId(){
        if(self::getUserIsAgency()){
            return Auth::user()->agency_id;
        }        
        return null;
    }


    /**
     * Get user oilco id
     */
    public static function getUserOilcoId(){
        if(self::getUserIsAgency()){
            return Auth::user()->oilco_id;
        }        
        return null;
    }


    /**
     * Get user KPDN branch id
     */
    public static function getKPDNBranchId(){
        if(self::getUserIsKPDN()){
            return Auth::user()->branch_id;
        }        
        return null;
    }

      /**
     * Get user type
     */
    public static function getUserType(){
        return Auth::user()->user_type_id;
    }

    /**
     * Get user types list
     */
    public static function getUserTypesList($addSelectAll=false){
        $data_list=\App\UserType::where('active','=',1)->where('show_in_list','=',1)->orderBy('name','asc')
        ->pluck('name','id');

        if($addSelectAll){
            $data_list->prepend(__('general.all'),-1);
        }

        //dd( $data_list);
        return $data_list;
    }


    /**
     * Get oil o list
     */
    public static function getOilcoList($addSelectAll=false){
        $data_list=\App\Oilco::where('isactive','=',1)->orderBy('name','asc')
        ->pluck('name','id');

        if($addSelectAll){
            $data_list->prepend(__('general.all'),-1);
        }

        //dd( $data_list);
        return $data_list;
    } 


     /**
     * Get agency list
     */
    public static function getAgencyList($addSelectAll=false){
        $data_list=\App\Agencie::where('active','=',1)->orderBy('name','asc')
        ->pluck('name','id');

        if($addSelectAll){
            $data_list->prepend(__('general.all'),-1);
        }

        //dd( $data_list);
        return $data_list;
    } 

}