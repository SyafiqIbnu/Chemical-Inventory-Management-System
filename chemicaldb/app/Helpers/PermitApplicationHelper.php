<?php
namespace App\Helpers;

use \App\User;
use Auth;
use DB;


class PermitApplicationHelper{

    /**
     * Check permit application can be deleted
     * Only account holder can delete application and status = draft
     */
    public static function checkCanDelete($modelPermitApplication,$returnErrorPage=true){
        //check by status
        if(self::checkCanDeleteByStatus($modelPermitApplication)){
            return self::returnFalseOrErrorPage(false,$returnErrorPage);
        }
      
        if(! self::checkCanDeleteAccountHolder($modelPermitApplication)){
            return self::returnFalseOrErrorPage(false,$returnErrorPage);
        }

        return true;
    }

    /**
     * Check can delete if user is account holder and model belongs to account holder
     */
    private static function checkCanDeleteAccountHolder($modelPermitApplication){
        
        if(! \App\Helpers\UserModelDataHelper::getUserIsAccountHolder()){
            return false;
        }

        //Check same account holder & current user account holder id
        if($modelPermitApplication->account_holder_id !=\App\Helpers\UserModelDataHelper::getUserAccountHolderId()){
            //Debugbar::info("User is account_holder_id not same");
            return false;
        }  
    }


    /**
     * Check permit application can be deleted by status
     */
    private static function checkCanDeleteByStatus($modelPermitApplication){
        $status_ids[] =\App\Enums\PermitApplicationStatusEnums::getStatusDraft();
        $result= in_array($modelPermitApplication->permit_application_status_id,$status_ids);
        return $result;
    }

    /**
     * Check permit application can view data
     */
    public static function checkCanView($modelPermitApplication,$returnErrorPage=true){
        
        //Has permission view permit application
        if (!PermissionHelper::hasPermitApplicationView()) {
            return self::returnFalseOrErrorPage(false,$returnErrorPage);
        }

        if(\App\Helpers\UserModelDataHelper::getUserIsAccountHolder()){
            //account holder
            if (!PermissionHelper::hasPermitApplicationActivityView(false)) {
                return self::returnFalseOrErrorPage(false,$returnErrorPage);
            }       
       
            if(! self::checkCanViewAccountHolder($modelPermitApplication)){
                return self::returnFalseOrErrorPage(false,$returnErrorPage);
            }
            
        }elseif(\App\Helpers\UserModelDataHelper::getUserIsKPDN()){
            if(! self::checkCanViewStaffBranch($modelPermitApplication)){
                if(! self::checkCanViewStaffHQ($modelPermitApplication)){
                    return self::returnFalseOrErrorPage(false,$returnErrorPage);
                }
            }
        }       
        return true;
    }


    private static function checkCanViewStaffBranch($modelPermitApplication){
        
        //Check status not draft
        if(! self::checkCanViewStaffStatusNotDraft($modelPermitApplication)){
            return false;
        }

        //Check same branch
        if($modelPermitApplication->permitActivity !=null){
            if($modelPermitApplication->permitActivity->branch_id !=\App\Helpers\UserModelDataHelper::getKPDNBranchId()){
                return false;
            }
        }

        return true;
    }

    private static function checkCanViewStaffHQ($modelPermitApplication){
        //Check status not draft
        if(! self::checkCanViewStaffStatusNotDraft($modelPermitApplication)){
            return false;
        }

        //Check same branch
        if($modelPermitApplication->permitActivity !=null){
            if($modelPermitApplication->permitActivity->branch_id !=\App\Helpers\UserModelDataHelper::getKPDNBranchId()){
                return false;
            }
        }


    }

    private static function checkCanViewStaffStatusNotDraft($modelPermitApplication){
        $status_ids[] =\App\Enums\PermitApplicationStatusEnums::getStatusDraft();
        $result= in_array($modelPermitApplication->permit_application_status_id,$status_ids);
        return ! $result;
    }

    private static function checkCanViewAccountHolder($modelPermitApplication){
        $bIsAccountHolder=false;

        if(! \App\Helpers\UserModelDataHelper::getUserIsAccountHolder()){
            return false;
        }

        //Check same account holder & current user account holder id
        if($modelPermitApplication->account_holder_id !=\App\Helpers\UserModelDataHelper::getUserAccountHolderId()){
            return false;
        }  
       
        return true; 
    }

    /**
     * Check permit application can be edit
     * Check by status, Check User is account holder, Check same account holder & current user account holder id
     */
    public static function checkCanEdit($modelPermitApplication){
        //Check by status
        $bStatus=self::checkCanEditByStatus($modelPermitApplication);
        if(! $bStatus){
            return false;
        }

        //Check User is account holder
        if( ! \App\Helpers\UserModelDataHelper::getUserIsAccountHolder()){
            //Debugbar::info("User is not Account Holder");
            return false;
        }

        //Check same account holder & current user account holder id
        if($modelPermitApplication->account_holder_id !=\App\Helpers\UserModelDataHelper::getUserAccountHolderId()){
            //Debugbar::info("User is account_holder_id not same");
            return false;
        }           

        return true;
    }

    /**
     * Check permit application can be edit by status 
     */
    public static function checkCanEditByStatus($modelPermitApplication){
        $status_ids[] =\App\Enums\PermitApplicationStatusEnums::getStatusDraft();
        $result= in_array($modelPermitApplication->permit_application_status_id,$status_ids);
        return $result;
    }

    /**
     * Check permit application can be edit by branch
     */
    public static function checkCanEditByBranch($modelPermitApplication){

    }

    /**
     * Check permit application can be edit permission
     */
    public static function checkCanEditByPermission($modelPermitApplication){

    }

    /**
     * Return false or return Error Page if based on false result
     */
    public static function returnFalseOrErrorPage($result,$returnErrorPage=true){
        if(! $result && $returnErrorPage){
            abort(403, __('general.unauthorizedAction.'));
        }       
        
        return $result;
    }

}