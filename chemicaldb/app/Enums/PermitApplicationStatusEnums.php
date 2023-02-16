<?php
namespace App\Enums;

class PermitApplicationStatusEnums
{
    
    private static $status_draft=1; // baru
    private static $status_onReview=2; // semakan
    private static $status_onApproval=3; // kelulusan
    private static $status_approved=4; // lulus 
    private static $status_denied=5; // lulus 
    private static $status_cancelled=99; // batal


    /**
     * Get status is draft
     */
    public static function getStatusDraft(){
        return self::$status_draft;
    } 

    /**
     * set status as draft
     */
    public static function setStatusDraft($model){
        $model->permit_application_status_id=self::$status_draft;
    }

    /**
     * Get status is on review
     */
    public static function getStatusOnReview(){
        return self::$status_onReview;
    }    
    
    /**
     * set status as on Review
     */
    public function setStatusOnReview($model){
        $model->permit_application_status_id=self::$status_onReview;
    }

    /**
     * Get status is on approval
     */
    public static function getStatusOnApproval(){
        return self::$status_onApproval;
    } 
    
    

    public static function getStatusDenied(){
        return self::$status_denied;
    } 

    /**
     * set status as on Approval
     */
    public static function setStatusOnApproval($model){
        $model->permit_application_status_id=self::$status_onApproval;
    }

    /**
     * Get status is approved
     */
    public static function getStatusApproved(){
        return self::$status_approved;
    }

    /**
     * set status as Approved
     */
    public static function setStatusApproved($model){
        $model->permit_application_status_id=self::$status_approved;
    }

    /**
     * Get status is cancelled
     */
    public static function getStatusCancelled(){
        return self::$status_cancelled;
    }

    /**
     * set status as cancelled
     */
    public static function setStatusCancelled($model){
        $model->permit_application_status_id=self::$status_approved;
    }
}


