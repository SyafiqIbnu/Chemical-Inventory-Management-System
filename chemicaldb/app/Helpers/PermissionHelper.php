<?php
namespace App\Helpers;

use \App\User;
use Auth;
use DB;
use Cache;


class PermissionHelper{
    
    use \App\Traits\UserPermissionTrait;
    
    public static $userPermissionList=null;

    /**
     * Initialize user permission list
     */
    public static function initUserPermissionsList(){
        if(self::$userPermissionList !=null){
            return;
        }        
       
        //$modelPermissions = \App\Permission::all();
        $d=array();
        //$d=Auth::user()->getPermissionsViaRoles();
        $key=Auth::user()->id."_permission";
        if (Cache::has($key)) {
            $d=$value = Cache::get($key);
        }else{
            // create cache
            $d=Auth::user()->getAllPermissions();
            Cache::put($key, $d,30);
        }

        self::$userPermissionList =$d->map(function($value){
			return ['permission_id'=>$value->name,'value'=>1];
		})->pluck('value','permission_id');
        //dd(self::$userPermissionList);
    }

    /**
     * Check user is super visor for user
     * @param int $current_user_id current user
     * @param int $refer_user_id supervisor id 
     * @return boolean result supervisor id is super visor for user
     */
    public static function isSupervisor($current_user_id, $refer_user_id) {
        $modelCurrUser = User::findOrFail($current_user_id);
        $modelReferUser = User::findOrFail($refer_user_id);     
        $qs="SELECT * FROM model_has_roles
        INNER JOIN roles ON (roles.id=model_has_roles.role_id)
        INNER JOIN role_has_permissions ON (role_has_permissions.role_id=roles.id)
        INNER JOIN `permissions` ON (permissions.id=role_has_permissions.`permission_id`)
        INNER JOIN users ON (users.id=model_has_roles.model_id)
        WHERE (permissions.name='evaluate_section_b_edit' OR permissions.name='evaluate_section_b_create')
        AND users.id=:currUser
        ";
        $authUserHasSupervisorPermission=DB::select(DB::raw($qs),[':currUser'=>$current_user_id]);
        //dd($authUserHasSupervisorPermission);
        
        $currUserDepartment=$modelCurrUser->userInfoIdUserInfo->departmentIdCoderegGeneralDepartment->id;
        $refUserDepartment=$modelCurrUser->userInfoIdUserInfo->departmentIdCoderegGeneralDepartment->id;
        //dd($currUserDepartment .'===='.$refUserDepartment);
        
        if($currUserDepartment==$refUserDepartment && count($authUserHasSupervisorPermission) > 0){
            return true;
        }
        
        return false;
    }
    

    public static function getUserWithPermission($prefix){
        $permits=self::handleParamArrayorStringWildcard($prefix);
        $qs="SELECT * FROM model_has_roles
        INNER JOIN roles ON (roles.id=model_has_roles.role_id)
        INNER JOIN role_has_permissions ON (role_has_permissions.role_id=roles.id)
        INNER JOIN `permissions` ON (permissions.id=role_has_permissions.`permission_id`)
        INNER JOIN users ON (users.id=model_has_roles.model_id)
        ";

        $qsPermits="";
        $iCounter=0;
        foreach($permits as $permit){
            if($iCounter > 0){
                $qsPermits=" OR ";
            }
            $qsPermits=" permissions.name LIKE '$permit%'";
            $iCounter++;
        }
        
        if($qsPermits !=""){
            $qs=$qs." WHERE (".$qsPermits .")";
        }
       
        $users=DB::select(DB::raw($qs));
        return User::hydrate($users);
    }

    private static function handleParamArrayorStringWildcard($permission){
       $allPermits=[];
       if(is_array($permission)){
            foreach($permission as $permit){
                if(stripos($permit,'*') !==FALSE){
                    $wildcardPermits=self::stringWildcardToArray($permit);
                    $allPermits=array_merge($allPermits,$wildcardPermits);
                }else{
                    $singlePermit[]=$permit;
                    $allPermits=array_merge($allPermits,$singlePermit);
                }
            }
        }else if(is_string($permission)){
            if(stripos($permission,'*') !==FALSE){
                $wildcardPermits=self::stringWildcardToArray($permission);
                $allPermits=array_merge($allPermits,$wildcardPermits);
            }else{
                $singlePermit[]=$permission;
                $allPermits=array_merge($allPermits,$singlePermit);
            }
        }

        return $allPermits;
    }

    private static function stringWildcardToArray($permit){
        $result=array();
        $permitNames=['view','create','edit','delete'];
        foreach($permitNames as $name){
            $result[]=str_replace("*",$name,$permit);
        }

        return $result;
    }


    /**
     * Check current user has permission 
     * @param unknown $permission user permission. Can be array or string. Support wildcard
     * @return boolean
     */
    public static function checkPermission($permission){
        $bFound=false;
        if(is_array($permission)){
            foreach($permission as $permit){
                if(stripos($permit,'*') !==FALSE){
                    if(\App\Helpers\PermissionHelper::checkWildcardPermission($permit)){
                        $bFound=true;
                        break;
                    }
                }else{
                    //if(auth()->user()->can($permit)){
                    if(self::authCan($permit)){
                        $bFound=true;
                        break;
                    }
                }
            }
        }else if(is_string($permission)){
            if($permission=="*"){
                return true;
            }elseif(stripos($permission,'*') !==FALSE){
                if(\App\Helpers\PermissionHelper::checkWildcardPermission($permission)){
                    $bFound=true;
                }
            }else{
                //if(auth()->user()->can($permission)){
                if(self::authCan($permission)){
                    $bFound=true;
                }
            }
        }       
        
        return $bFound;
    }
    
    /**
     * Check wilrdcard permission
     * @param unknown $permit
     * @return boolean
     */
    public static function checkWildcardPermission($permit){
        $bFound=false;
        $permit1=str_replace("*","create",$permit);
        //if(Auth::user()->can($permit1)){
        if(self::authCan($permit1)){
            $bFound=true;
            return $bFound;
        }
        
        $permit1=str_replace("*","edit",$permit);
        //if(Auth::user()->can($permit1)){
        if(self::authCan($permit1)){
                $bFound=true;
            return $bFound;
        }
        
        $permit1=str_replace("*","delete",$permit);
        //if(Auth::user()->can($permit1)){
        if(self::authCan($permit1)){
            $bFound=true;
            return $bFound;
        }
        
        $permit1=str_replace("*","view",$permit);
        //if(Auth::user()->can($permit1)){
        if(self::authCan($permit1)){
            $bFound=true;
            return $bFound;
        }
        
        return $bFound;
    }

    /**
     * Check user has permission
     * @param boolean return404 if result is false then return 404 message
     * @return boolean result
     */
    public static function isAccess($url,$return404) {
        if($url=="*"){
            return true; 
        }elseif(self::checkPermission($url)){
            return true; 
        }else{
            if($return404){
                return abort(404);
            }

            return false;
        }
    }

    /**
     * Check auth for permission id. 
     * Used to to replace Auth::user()->can() funtion
     * Perfomance expected to be faster
     * @param $permit permission name
     * @return boolean result
     */
    public static function authCan($permit){
        // init if not initialized yet
        self::initUserPermissionsList();  
        if(isset(self::$userPermissionList[$permit])){
            return true;
        }
        return false;
    }
    
}