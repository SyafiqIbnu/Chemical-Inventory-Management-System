<?php

       namespace App\Traits;       
       use Auth;

       trait UserPermissionTrait
       {
           
        public static function hasApplicationCreate($return404=true){
            return self::isAccess('application_create',$return404);     
        }
        
        public static function hasApplicationEdit($return404=true){
            return self::isAccess('application_edit',$return404);     
        }
        
        public static function hasApplicationView($return404=true){
            return self::isAccess('application_view',$return404);     
        }
        
        public static function hasApplicationDelete($return404=true){
            return self::isAccess('application_delete',$return404);     
        }
        
        public static function hasRoleCreate($return404=true){
            return self::isAccess('role_create',$return404);     
        }
        
        public static function hasRoleEdit($return404=true){
            return self::isAccess('role_edit',$return404);     
        }
        
        public static function hasRoleView($return404=true){
            return self::isAccess('role_view',$return404);     
        }
        
        public static function hasRoleDelete($return404=true){
            return self::isAccess('role_delete',$return404);     
        }
        
        public static function hasAnnouncementCreate($return404=true){
            return self::isAccess('announcement_create',$return404);     
        }
        
        public static function hasAnnouncementEdit($return404=true){
            return self::isAccess('announcement_edit',$return404);     
        }
        
        public static function hasAnnouncementView($return404=true){
            return self::isAccess('announcement_view',$return404);     
        }
        
        public static function hasAnnouncementDelete($return404=true){
            return self::isAccess('announcement_delete',$return404);     
        }
        
        public static function hasUserCreate($return404=true){
            return self::isAccess('user_create',$return404);     
        }
        
        public static function hasUserEdit($return404=true){
            return self::isAccess('user_edit',$return404);     
        }
        
        public static function hasUserView($return404=true){
            return self::isAccess('user_view',$return404);     
        }
        
        public static function hasUserDelete($return404=true){
            return self::isAccess('user_delete',$return404);     
        }
        
        public static function hasSurveyorCreate($return404=true){
            return self::isAccess('surveyor_create',$return404);     
        }
        
        public static function hasSurveyorEdit($return404=true){
            return self::isAccess('surveyor_edit',$return404);     
        }
        
        public static function hasSurveyorView($return404=true){
            return self::isAccess('surveyor_view',$return404);     
        }
        
        public static function hasSurveyorDelete($return404=true){
            return self::isAccess('surveyor_delete',$return404);     
        }
        
        public static function hasInfraTypeCreate($return404=true){
            return self::isAccess('infra_type_create',$return404);     
        }
        
        public static function hasInfraTypeEdit($return404=true){
            return self::isAccess('infra_type_edit',$return404);     
        }
        
        public static function hasInfraTypeView($return404=true){
            return self::isAccess('infra_type_view',$return404);     
        }
        
        public static function hasInfraTypeDelete($return404=true){
            return self::isAccess('infra_type_delete',$return404);     
        }
        
        public static function hasCustomerTypeCreate($return404=true){
            return self::isAccess('customer_type_create',$return404);     
        }
        
        public static function hasCustomerTypeEdit($return404=true){
            return self::isAccess('customer_type_edit',$return404);     
        }
        
        public static function hasCustomerTypeView($return404=true){
            return self::isAccess('customer_type_view',$return404);     
        }
        
        public static function hasCustomerTypeDelete($return404=true){
            return self::isAccess('customer_type_delete',$return404);     
        }
        
        public static function hasDistrictCreate($return404=true){
            return self::isAccess('district_create',$return404);     
        }
        
        public static function hasDistrictEdit($return404=true){
            return self::isAccess('district_edit',$return404);     
        }
        
        public static function hasDistrictView($return404=true){
            return self::isAccess('district_view',$return404);     
        }
        
        public static function hasDistrictDelete($return404=true){
            return self::isAccess('district_delete',$return404);     
        }
        
        public static function hasSurveyCreate($return404=true){
            return self::isAccess('survey_create',$return404);     
        }
        
        public static function hasSurveyEdit($return404=true){
            return self::isAccess('survey_edit',$return404);     
        }
        
        public static function hasSurveyView($return404=true){
            return self::isAccess('survey_view',$return404);     
        }
        
        public static function hasSurveyDelete($return404=true){
            return self::isAccess('survey_delete',$return404);     
        }
        
        public static function hasSurveyStatuCreate($return404=true){
            return self::isAccess('survey_statu_create',$return404);     
        }
        
        public static function hasSurveyStatuEdit($return404=true){
            return self::isAccess('survey_statu_edit',$return404);     
        }
        
        public static function hasSurveyStatuView($return404=true){
            return self::isAccess('survey_statu_view',$return404);     
        }
        
        public static function hasSurveyStatuDelete($return404=true){
            return self::isAccess('survey_statu_delete',$return404);     
        }
        
        public static function hasAccountApplicationStatuCreate($return404=true){
            return self::isAccess('account_application_statu_create',$return404);     
        }
        
        public static function hasAccountApplicationStatuEdit($return404=true){
            return self::isAccess('account_application_statu_edit',$return404);     
        }
        
        public static function hasAccountApplicationStatuView($return404=true){
            return self::isAccess('account_application_statu_view',$return404);     
        }
        
        public static function hasAccountApplicationStatuDelete($return404=true){
            return self::isAccess('account_application_statu_delete',$return404);     
        }
        
        public static function hasAccountTypeCreate($return404=true){
            return self::isAccess('account_type_create',$return404);     
        }
        
        public static function hasAccountTypeEdit($return404=true){
            return self::isAccess('account_type_edit',$return404);     
        }
        
        public static function hasAccountTypeView($return404=true){
            return self::isAccess('account_type_view',$return404);     
        }
        
        public static function hasAccountTypeDelete($return404=true){
            return self::isAccess('account_type_delete',$return404);     
        }
        
        public static function hasAccountContactCreate($return404=true){
            return self::isAccess('account_contact_create',$return404);     
        }
        
        public static function hasAccountContactEdit($return404=true){
            return self::isAccess('account_contact_edit',$return404);     
        }
        
        public static function hasAccountContactView($return404=true){
            return self::isAccess('account_contact_view',$return404);     
        }
        
        public static function hasAccountContactDelete($return404=true){
            return self::isAccess('account_contact_delete',$return404);     
        }
        
        public static function hasAccountHolderCreate($return404=true){
            return self::isAccess('account_holder_create',$return404);     
        }
        
        public static function hasAccountHolderEdit($return404=true){
            return self::isAccess('account_holder_edit',$return404);     
        }
        
        public static function hasAccountHolderView($return404=true){
            return self::isAccess('account_holder_view',$return404);     
        }
        
        public static function hasAccountHolderDelete($return404=true){
            return self::isAccess('account_holder_delete',$return404);     
        }
        
        public static function hasAccountHoldersShareHolderCreate($return404=true){
            return self::isAccess('account_holders_share_holder_create',$return404);     
        }
        
        public static function hasAccountHoldersShareHolderEdit($return404=true){
            return self::isAccess('account_holders_share_holder_edit',$return404);     
        }
        
        public static function hasAccountHoldersShareHolderView($return404=true){
            return self::isAccess('account_holders_share_holder_view',$return404);     
        }
        
        public static function hasAccountHoldersShareHolderDelete($return404=true){
            return self::isAccess('account_holders_share_holder_delete',$return404);     
        }
        
        public static function hasActitivyTypeCreate($return404=true){
            return self::isAccess('actitivy_type_create',$return404);     
        }
        
        public static function hasActitivyTypeEdit($return404=true){
            return self::isAccess('actitivy_type_edit',$return404);     
        }
        
        public static function hasActitivyTypeView($return404=true){
            return self::isAccess('actitivy_type_view',$return404);     
        }
        
        public static function hasActitivyTypeDelete($return404=true){
            return self::isAccess('actitivy_type_delete',$return404);     
        }
        
        public static function hasApplicantCategorieCreate($return404=true){
            return self::isAccess('applicant_categorie_create',$return404);     
        }
        
        public static function hasApplicantCategorieEdit($return404=true){
            return self::isAccess('applicant_categorie_edit',$return404);     
        }
        
        public static function hasApplicantCategorieView($return404=true){
            return self::isAccess('applicant_categorie_view',$return404);     
        }
        
        public static function hasApplicantCategorieDelete($return404=true){
            return self::isAccess('applicant_categorie_delete',$return404);     
        }
        
        public static function hasCitieCreate($return404=true){
            return self::isAccess('citie_create',$return404);     
        }
        
        public static function hasCitieEdit($return404=true){
            return self::isAccess('citie_edit',$return404);     
        }
        
        public static function hasCitieView($return404=true){
            return self::isAccess('citie_view',$return404);     
        }
        
        public static function hasCitieDelete($return404=true){
            return self::isAccess('citie_delete',$return404);     
        }
        
        public static function hasControlledGoodsTypeCreate($return404=true){
            return self::isAccess('controlled_goods_type_create',$return404);     
        }
        
        public static function hasControlledGoodsTypeEdit($return404=true){
            return self::isAccess('controlled_goods_type_edit',$return404);     
        }
        
        public static function hasControlledGoodsTypeView($return404=true){
            return self::isAccess('controlled_goods_type_view',$return404);     
        }
        
        public static function hasControlledGoodsTypeDelete($return404=true){
            return self::isAccess('controlled_goods_type_delete',$return404);     
        }
        
        public static function hasDesignationCreate($return404=true){
            return self::isAccess('designation_create',$return404);     
        }
        
        public static function hasDesignationEdit($return404=true){
            return self::isAccess('designation_edit',$return404);     
        }
        
        public static function hasDesignationView($return404=true){
            return self::isAccess('designation_view',$return404);     
        }
        
        public static function hasDesignationDelete($return404=true){
            return self::isAccess('designation_delete',$return404);     
        }
        
        public static function hasDocumentTypeCreate($return404=true){
            return self::isAccess('document_type_create',$return404);     
        }
        
        public static function hasDocumentTypeEdit($return404=true){
            return self::isAccess('document_type_edit',$return404);     
        }
        
        public static function hasDocumentTypeView($return404=true){
            return self::isAccess('document_type_view',$return404);     
        }
        
        public static function hasDocumentTypeDelete($return404=true){
            return self::isAccess('document_type_delete',$return404);     
        }
        
        public static function hasEquipmentCreate($return404=true){
            return self::isAccess('equipment_create',$return404);     
        }
        
        public static function hasEquipmentEdit($return404=true){
            return self::isAccess('equipment_edit',$return404);     
        }
        
        public static function hasEquipmentView($return404=true){
            return self::isAccess('equipment_view',$return404);     
        }
        
        public static function hasEquipmentDelete($return404=true){
            return self::isAccess('equipment_delete',$return404);     
        }
        
        public static function hasFuelStationCreate($return404=true){
            return self::isAccess('fuel_station_create',$return404);     
        }
        
        public static function hasFuelStationEdit($return404=true){
            return self::isAccess('fuel_station_edit',$return404);     
        }
        
        public static function hasFuelStationView($return404=true){
            return self::isAccess('fuel_station_view',$return404);     
        }
        
        public static function hasFuelStationDelete($return404=true){
            return self::isAccess('fuel_station_delete',$return404);     
        }
        
        public static function hasOilcoCreate($return404=true){
            return self::isAccess('oilco_create',$return404);     
        }
        
        public static function hasOilcoEdit($return404=true){
            return self::isAccess('oilco_edit',$return404);     
        }
        
        public static function hasOilcoView($return404=true){
            return self::isAccess('oilco_view',$return404);     
        }
        
        public static function hasOilcoDelete($return404=true){
            return self::isAccess('oilco_delete',$return404);     
        }
        
        public static function hasPermitApplicationDocumentCreate($return404=true){
            return self::isAccess('permit_application_document_create',$return404);     
        }
        
        public static function hasPermitApplicationDocumentEdit($return404=true){
            return self::isAccess('permit_application_document_edit',$return404);     
        }
        
        public static function hasPermitApplicationDocumentView($return404=true){
            return self::isAccess('permit_application_document_view',$return404);     
        }
        
        public static function hasPermitApplicationDocumentDelete($return404=true){
            return self::isAccess('permit_application_document_delete',$return404);     
        }
        
        public static function hasPermitApplicationPurchaCreate($return404=true){
            return self::isAccess('permit_application_purcha_create',$return404);     
        }
        
        public static function hasPermitApplicationPurchaEdit($return404=true){
            return self::isAccess('permit_application_purcha_edit',$return404);     
        }
        
        public static function hasPermitApplicationPurchaView($return404=true){
            return self::isAccess('permit_application_purcha_view',$return404);     
        }
        
        public static function hasPermitApplicationPurchaDelete($return404=true){
            return self::isAccess('permit_application_purcha_delete',$return404);     
        }
        
        public static function hasPermitApplicationStatuCreate($return404=true){
            return self::isAccess('permit_application_statu_create',$return404);     
        }
        
        public static function hasPermitApplicationStatuEdit($return404=true){
            return self::isAccess('permit_application_statu_edit',$return404);     
        }
        
        public static function hasPermitApplicationStatuView($return404=true){
            return self::isAccess('permit_application_statu_view',$return404);     
        }
        
        public static function hasPermitApplicationStatuDelete($return404=true){
            return self::isAccess('permit_application_statu_delete',$return404);     
        }
        
        public static function hasPermitApplicationTypeCreate($return404=true){
            return self::isAccess('permit_application_type_create',$return404);     
        }
        
        public static function hasPermitApplicationTypeEdit($return404=true){
            return self::isAccess('permit_application_type_edit',$return404);     
        }
        
        public static function hasPermitApplicationTypeView($return404=true){
            return self::isAccess('permit_application_type_view',$return404);     
        }
        
        public static function hasPermitApplicationTypeDelete($return404=true){
            return self::isAccess('permit_application_type_delete',$return404);     
        }
        
        public static function hasPermitApplicationUsageCreate($return404=true){
            return self::isAccess('permit_application_usage_create',$return404);     
        }
        
        public static function hasPermitApplicationUsageEdit($return404=true){
            return self::isAccess('permit_application_usage_edit',$return404);     
        }
        
        public static function hasPermitApplicationUsageView($return404=true){
            return self::isAccess('permit_application_usage_view',$return404);     
        }
        
        public static function hasPermitApplicationUsageDelete($return404=true){
            return self::isAccess('permit_application_usage_delete',$return404);     
        }
        
        public static function hasPermitApplicationCreate($return404=true){
            return self::isAccess('permit_application_create',$return404);     
        }
        
        public static function hasPermitApplicationEdit($return404=true){
            return self::isAccess('permit_application_edit',$return404);     
        }
        
        public static function hasPermitApplicationView($return404=true){
            return self::isAccess('permit_application_view',$return404);     
        }
        
        public static function hasPermitApplicationDelete($return404=true){
            return self::isAccess('permit_application_delete',$return404);     
        }
        
        public static function hasPermitDocumentCreate($return404=true){
            return self::isAccess('permit_document_create',$return404);     
        }
        
        public static function hasPermitDocumentEdit($return404=true){
            return self::isAccess('permit_document_edit',$return404);     
        }
        
        public static function hasPermitDocumentView($return404=true){
            return self::isAccess('permit_document_view',$return404);     
        }
        
        public static function hasPermitDocumentDelete($return404=true){
            return self::isAccess('permit_document_delete',$return404);     
        }
        
        public static function hasPermitPurchaCreate($return404=true){
            return self::isAccess('permit_purcha_create',$return404);     
        }
        
        public static function hasPermitPurchaEdit($return404=true){
            return self::isAccess('permit_purcha_edit',$return404);     
        }
        
        public static function hasPermitPurchaView($return404=true){
            return self::isAccess('permit_purcha_view',$return404);     
        }
        
        public static function hasPermitPurchaDelete($return404=true){
            return self::isAccess('permit_purcha_delete',$return404);     
        }
        
        public static function hasPermitStatuCreate($return404=true){
            return self::isAccess('permit_statu_create',$return404);     
        }
        
        public static function hasPermitStatuEdit($return404=true){
            return self::isAccess('permit_statu_edit',$return404);     
        }
        
        public static function hasPermitStatuView($return404=true){
            return self::isAccess('permit_statu_view',$return404);     
        }
        
        public static function hasPermitStatuDelete($return404=true){
            return self::isAccess('permit_statu_delete',$return404);     
        }
        
        public static function hasPermitUsageCreate($return404=true){
            return self::isAccess('permit_usage_create',$return404);     
        }
        
        public static function hasPermitUsageEdit($return404=true){
            return self::isAccess('permit_usage_edit',$return404);     
        }
        
        public static function hasPermitUsageView($return404=true){
            return self::isAccess('permit_usage_view',$return404);     
        }
        
        public static function hasPermitUsageDelete($return404=true){
            return self::isAccess('permit_usage_delete',$return404);     
        }
        
        public static function hasPermitCreate($return404=true){
            return self::isAccess('permit_create',$return404);     
        }
        
        public static function hasPermitEdit($return404=true){
            return self::isAccess('permit_edit',$return404);     
        }
        
        public static function hasPermitView($return404=true){
            return self::isAccess('permit_view',$return404);     
        }
        
        public static function hasPermitDelete($return404=true){
            return self::isAccess('permit_delete',$return404);     
        }
        
        public static function hasPurchaseTypeCreate($return404=true){
            return self::isAccess('purchase_type_create',$return404);     
        }
        
        public static function hasPurchaseTypeEdit($return404=true){
            return self::isAccess('purchase_type_edit',$return404);     
        }
        
        public static function hasPurchaseTypeView($return404=true){
            return self::isAccess('purchase_type_view',$return404);     
        }
        
        public static function hasPurchaseTypeDelete($return404=true){
            return self::isAccess('purchase_type_delete',$return404);     
        }
        
        public static function hasRegActiveCreate($return404=true){
            return self::isAccess('reg_active_create',$return404);     
        }
        
        public static function hasRegActiveEdit($return404=true){
            return self::isAccess('reg_active_edit',$return404);     
        }
        
        public static function hasRegActiveView($return404=true){
            return self::isAccess('reg_active_view',$return404);     
        }
        
        public static function hasRegActiveDelete($return404=true){
            return self::isAccess('reg_active_delete',$return404);     
        }
        
        public static function hasStateCreate($return404=true){
            return self::isAccess('state_create',$return404);     
        }
        
        public static function hasStateEdit($return404=true){
            return self::isAccess('state_edit',$return404);     
        }
        
        public static function hasStateView($return404=true){
            return self::isAccess('state_view',$return404);     
        }
        
        public static function hasStateDelete($return404=true){
            return self::isAccess('state_delete',$return404);     
        }
        
        public static function hasBranchCreate($return404=true){
            return self::isAccess('branch_create',$return404);     
        }
        
        public static function hasBranchEdit($return404=true){
            return self::isAccess('branch_edit',$return404);     
        }
        
        public static function hasBranchView($return404=true){
            return self::isAccess('branch_view',$return404);     
        }
        
        public static function hasBranchDelete($return404=true){
            return self::isAccess('branch_delete',$return404);     
        }
        
        public static function hasUserTypeCreate($return404=true){
            return self::isAccess('user_type_create',$return404);     
        }
        
        public static function hasUserTypeEdit($return404=true){
            return self::isAccess('user_type_edit',$return404);     
        }
        
        public static function hasUserTypeView($return404=true){
            return self::isAccess('user_type_view',$return404);     
        }
        
        public static function hasUserTypeDelete($return404=true){
            return self::isAccess('user_type_delete',$return404);     
        }
        
        public static function hasAgencieCreate($return404=true){
            return self::isAccess('agencie_create',$return404);     
        }
        
        public static function hasAgencieEdit($return404=true){
            return self::isAccess('agencie_edit',$return404);     
        }
        
        public static function hasAgencieView($return404=true){
            return self::isAccess('agencie_view',$return404);     
        }
        
        public static function hasAgencieDelete($return404=true){
            return self::isAccess('agencie_delete',$return404);     
        }
        
        public static function hasInboxCreate($return404=true){
            return self::isAccess('inbox_create',$return404);     
        }
        
        public static function hasInboxEdit($return404=true){
            return self::isAccess('inbox_edit',$return404);     
        }
        
        public static function hasInboxView($return404=true){
            return self::isAccess('inbox_view',$return404);     
        }
        
        public static function hasInboxDelete($return404=true){
            return self::isAccess('inbox_delete',$return404);     
        }
        
        public static function hasBookCategoryCreate($return404=true){
            return self::isAccess('book_category_create',$return404);     
        }
        
        public static function hasBookCategoryEdit($return404=true){
            return self::isAccess('book_category_edit',$return404);     
        }
        
        public static function hasBookCategoryView($return404=true){
            return self::isAccess('book_category_view',$return404);     
        }
        
        public static function hasBookCategoryDelete($return404=true){
            return self::isAccess('book_category_delete',$return404);     
        }
        
        public static function hasBookCreate($return404=true){
            return self::isAccess('book_create',$return404);     
        }
        
        public static function hasBookEdit($return404=true){
            return self::isAccess('book_edit',$return404);     
        }
        
        public static function hasBookView($return404=true){
            return self::isAccess('book_view',$return404);     
        }
        
        public static function hasBookDelete($return404=true){
            return self::isAccess('book_delete',$return404);     
        }
        
        public static function hasCityCreate($return404=true){
            return self::isAccess('city_create',$return404);     
        }
        
        public static function hasCityEdit($return404=true){
            return self::isAccess('city_edit',$return404);     
        }
        
        public static function hasCityView($return404=true){
            return self::isAccess('city_view',$return404);     
        }
        
        public static function hasCityDelete($return404=true){
            return self::isAccess('city_delete',$return404);     
        }
        
        public static function hasApplicantCategoryCreate($return404=true){
            return self::isAccess('applicant_category_create',$return404);     
        }
        
        public static function hasApplicantCategoryEdit($return404=true){
            return self::isAccess('applicant_category_edit',$return404);     
        }
        
        public static function hasApplicantCategoryView($return404=true){
            return self::isAccess('applicant_category_view',$return404);     
        }
        
        public static function hasApplicantCategoryDelete($return404=true){
            return self::isAccess('applicant_category_delete',$return404);     
        }
        
        public static function hasPermitApplicationPurchaseCreate($return404=true){
            return self::isAccess('permit_application_purchase_create',$return404);     
        }
        
        public static function hasPermitApplicationPurchaseEdit($return404=true){
            return self::isAccess('permit_application_purchase_edit',$return404);     
        }
        
        public static function hasPermitApplicationPurchaseView($return404=true){
            return self::isAccess('permit_application_purchase_view',$return404);     
        }
        
        public static function hasPermitApplicationPurchaseDelete($return404=true){
            return self::isAccess('permit_application_purchase_delete',$return404);     
        }
        
        public static function hasPermitApplicationActivityCreate($return404=true){
            return self::isAccess('permit_application_activity_create',$return404);     
        }
        
        public static function hasPermitApplicationActivityEdit($return404=true){
            return self::isAccess('permit_application_activity_edit',$return404);     
        }
        
        public static function hasPermitApplicationActivityView($return404=true){
            return self::isAccess('permit_application_activity_view',$return404);     
        }
        
        public static function hasPermitApplicationActivityDelete($return404=true){
            return self::isAccess('permit_application_activity_delete',$return404);     
        }
        
        public static function hasSupplierCreate($return404=true){
            return self::isAccess('supplier_create',$return404);     
        }
        
        public static function hasSupplierEdit($return404=true){
            return self::isAccess('supplier_edit',$return404);     
        }
        
        public static function hasSupplierView($return404=true){
            return self::isAccess('supplier_view',$return404);     
        }
        
        public static function hasSupplierDelete($return404=true){
            return self::isAccess('supplier_delete',$return404);     
        }
        
        public static function hasAgencyTypeCreate($return404=true){
            return self::isAccess('agency_type_create',$return404);     
        }
        
        public static function hasAgencyTypeEdit($return404=true){
            return self::isAccess('agency_type_edit',$return404);     
        }
        
        public static function hasAgencyTypeView($return404=true){
            return self::isAccess('agency_type_view',$return404);     
        }
        
        public static function hasAgencyTypeDelete($return404=true){
            return self::isAccess('agency_type_delete',$return404);     
        }
        
        public static function hasAccountApplicationCreate($return404=true){
            return self::isAccess('account_application_create',$return404);     
        }
        
        public static function hasAccountApplicationEdit($return404=true){
            return self::isAccess('account_application_edit',$return404);     
        }
        
        public static function hasAccountApplicationView($return404=true){
            return self::isAccess('account_application_view',$return404);     
        }
        
        public static function hasAccountApplicationDelete($return404=true){
            return self::isAccess('account_application_delete',$return404);     
        }
        
        public static function hasPermitApplicationReviewEdit($return404=true){
            return self::isAccess('permit_application_review_edit',$return404);     
        }
        
        public static function hasPermitApplicationReviewView($return404=true){
            return self::isAccess('permit_application_review_view',$return404);     
        }
        
        public static function hasPermitApplicationApprovalCreate($return404=true){
            return self::isAccess('permit_application_approval_create',$return404);     
        }
        
        public static function hasPermitApplicationApprovalEdit($return404=true){
            return self::isAccess('permit_application_approval_edit',$return404);     
        }
        
        public static function hasPermitApplicationApprovalView($return404=true){
            return self::isAccess('permit_application_approval_view',$return404);     
        }
        
        public static function hasPermitApplicationApprovalDelete($return404=true){
            return self::isAccess('permit_application_approval_delete',$return404);     
        }
        
        public static function hasProfileCreate($return404=true){
            return self::isAccess('profile_create',$return404);     
        }
        
        public static function hasProfileEdit($return404=true){
            return self::isAccess('profile_edit',$return404);     
        }
        
        public static function hasProfileView($return404=true){
            return self::isAccess('profile_view',$return404);     
        }
        
        public static function hasProfileDelete($return404=true){
            return self::isAccess('profile_delete',$return404);     
        }
        
        public static function hasEmailCreate($return404=true){
            return self::isAccess('email_create',$return404);     
        }
        
        public static function hasEmailEdit($return404=true){
            return self::isAccess('email_edit',$return404);     
        }
        
        public static function hasEmailView($return404=true){
            return self::isAccess('email_view',$return404);     
        }
        
        public static function hasEmailDelete($return404=true){
            return self::isAccess('email_delete',$return404);     
        }
        
        
        
       }