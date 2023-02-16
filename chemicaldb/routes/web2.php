<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Helpers\SendMailMessage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/login', 'Auth\LoginController@tfaLogin')->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('account_application_statu/export-remote/{type}', 'AccountApplicationStatuController@index')->name('account_application_statu.export_pdf');
    Route::post('account_application_statu/indexAjax', 'AccountApplicationStatuController@indexAjax')->name('account_application_statu.indexAjax');
    Route::get('account_application_statu/indexAjax', 'AccountApplicationStatuController@indexAjax')->name('account_application_statu.indexAjax');
    Route::resource('account_application_statu','AccountApplicationStatuController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('account_contact/export-remote/{type}', 'AccountContactController@index')->name('account_contact.export_pdf');
    Route::post('account_contact/indexAjax', 'AccountContactController@indexAjax')->name('account_contact.indexAjax');
    Route::get('account_contact/indexAjax', 'AccountContactController@indexAjax')->name('account_contact.indexAjax');
    Route::resource('account_contact','AccountContactController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('account_holder/export-remote/{type}', 'AccountHolderController@index')->name('account_holder.export_pdf');
    Route::post('account_holder/indexAjax', 'AccountHolderController@indexAjax')->name('account_holder.indexAjax');
    Route::get('account_holder/indexAjax', 'AccountHolderController@indexAjax')->name('account_holder.indexAjax');
    Route::resource('account_holder','AccountHolderController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('account_holders_share_holder/export-remote/{type}', 'AccountHoldersShareHolderController@index')->name('account_holders_share_holder.export_pdf');
    Route::post('account_holders_share_holder/indexAjax', 'AccountHoldersShareHolderController@indexAjax')->name('account_holders_share_holder.indexAjax');
    Route::get('account_holders_share_holder/indexAjax', 'AccountHoldersShareHolderController@indexAjax')->name('account_holders_share_holder.indexAjax');
    Route::resource('account_holders_share_holder','AccountHoldersShareHolderController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('account_type/export-remote/{type}', 'AccountTypeController@index')->name('account_type.export_pdf');
    Route::post('account_type/indexAjax', 'AccountTypeController@indexAjax')->name('account_type.indexAjax');
    Route::get('account_type/indexAjax', 'AccountTypeController@indexAjax')->name('account_type.indexAjax');
    Route::resource('account_type','AccountTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('actitivy_type/export-remote/{type}', 'ActitivyTypeController@index')->name('actitivy_type.export_pdf');
    Route::post('actitivy_type/indexAjax', 'ActitivyTypeController@indexAjax')->name('actitivy_type.indexAjax');
    Route::get('actitivy_type/indexAjax', 'ActitivyTypeController@indexAjax')->name('actitivy_type.indexAjax');
    Route::resource('actitivy_type','ActitivyTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('agencie/export-remote/{type}', 'AgencieController@index')->name('agencie.export_pdf');
    Route::post('agencie/indexAjax', 'AgencieController@indexAjax')->name('agencie.indexAjax');
    Route::get('agencie/indexAjax', 'AgencieController@indexAjax')->name('agencie.indexAjax');
    Route::resource('agencie','AgencieController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('agency_department/export-remote/{type}', 'AgencyDepartmentController@index')->name('agency_department.export_pdf');
    Route::post('agency_department/indexAjax', 'AgencyDepartmentController@indexAjax')->name('agency_department.indexAjax');
    Route::get('agency_department/indexAjax', 'AgencyDepartmentController@indexAjax')->name('agency_department.indexAjax');
    Route::resource('agency_department','AgencyDepartmentController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('agency_type/export-remote/{type}', 'AgencyTypeController@index')->name('agency_type.export_pdf');
    Route::post('agency_type/indexAjax', 'AgencyTypeController@indexAjax')->name('agency_type.indexAjax');
    Route::get('agency_type/indexAjax', 'AgencyTypeController@indexAjax')->name('agency_type.indexAjax');
    Route::resource('agency_type','AgencyTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('announcement/export-remote/pdf', 'AnnouncementController@index')->name('announcement.export_pdf');
    Route::post('announcement/export-remote/excel', 'AnnouncementController@index')->name('announcement.export_excel');
    Route::post('announcement/indexAjax', 'AnnouncementController@indexAjax')->name('announcement.indexAjax');
    Route::get('announcement/indexAjax', 'AnnouncementController@indexAjax')->name('announcement.indexAjax');
    Route::resource('announcement','AnnouncementController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('applicant_categorie/export-remote/{type}', 'ApplicantCategorieController@index')->name('applicant_categorie.export_pdf');
    Route::post('applicant_categorie/indexAjax', 'ApplicantCategorieController@indexAjax')->name('applicant_categorie.indexAjax');
    Route::get('applicant_categorie/indexAjax', 'ApplicantCategorieController@indexAjax')->name('applicant_categorie.indexAjax');
    Route::resource('applicant_categorie','ApplicantCategorieController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('applicant_category/export-remote/{type}', 'ApplicantCategoryController@index')->name('applicant_category.export_pdf');
    Route::post('applicant_category/indexAjax', 'ApplicantCategoryController@indexAjax')->name('applicant_category.indexAjax');
    Route::get('applicant_category/indexAjax', 'ApplicantCategoryController@indexAjax')->name('applicant_category.indexAjax');
    Route::resource('applicant_category','ApplicantCategoryController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('application/export-remote/pdf', 'ApplicationController@index')->name('application.export_pdf');
    Route::post('application/export-remote/excel', 'ApplicationController@index')->name('application.export_excel');
    Route::post('application/indexAjax', 'ApplicationController@indexAjax')->name('application.indexAjax');
    Route::get('application/indexAjax', 'ApplicationController@indexAjax')->name('application.indexAjax');
    Route::resource('application','ApplicationController');

    Route::get('application/redirect/{code}', 'ApplicationController@redirect')->name('application.redirect');
    Route::get('application/keep_alive/{code}/{token}', 'ApplicationController@keepAlive')->name('application.keep_alive');
    Route::get('application/logout/{code}/{token}', 'ApplicationController@logout')->name('application.logout');
    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('book/export-remote/{type}', 'BookController@index')->name('book.export_pdf');
    Route::post('book/indexAjax', 'BookController@indexAjax')->name('book.indexAjax');
    Route::get('book/indexAjax', 'BookController@indexAjax')->name('book.indexAjax');
    Route::resource('book','BookController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('book_category/export-remote/{type}', 'BookCategoryController@index')->name('book_category.export_pdf');
    Route::post('book_category/indexAjax', 'BookCategoryController@indexAjax')->name('book_category.indexAjax');
    Route::get('book_category/indexAjax', 'BookCategoryController@indexAjax')->name('book_category.indexAjax');
    Route::resource('book_category','BookCategoryController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking/export-remote/{type}', 'BookingController@index')->name('booking.export_pdf');
    Route::post('booking/indexAjax', 'BookingController@indexAjax')->name('booking.indexAjax');
    Route::get('booking/indexAjax', 'BookingController@indexAjax')->name('booking.indexAjax');
    Route::resource('booking','BookingController');

    Route::post('booking/submitToOfficer/{id}', 'BookingController@submitToOfficer')->name('booking.submitToOfficer');

    Route::get('booking/startjob/{id}', 'BookingController@startjob')->name('booking.startjobs');
    Route::post('booking/startjob_update/{id}', 'BookingController@startjob_update')->name('booking.startjob_update');

    Route::get('booking/submission/{id}', 'BookingController@submission')->name('booking.submission');
    Route::post('booking/submission_update/{id}', 'BookingController@submission_update')->name('booking.submission_update');

    Route::get('booking/approval/{id}', 'BookingController@approval')->name('booking.approval');
    Route::put('booking/approval_update/{id}', 'BookingController@approval_update')->name('booking.approval_update');

    Route::get('booking/endjob/{id}', 'BookingController@endjob')->name('booking.endjob');
    Route::post('booking/endjob_update/{id}', 'BookingController@endjob_update')->name('booking.endjob_update');

    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_application/export-remote/{type}', 'BookingApplicationController@index')->name('booking_application.export_pdf');
    Route::post('booking_application/indexAjax', 'BookingApplicationController@indexAjax')->name('booking_application.indexAjax');
    Route::get('booking_application/indexAjax', 'BookingApplicationController@indexAjax')->name('booking_application.indexAjax');
    Route::resource('booking_application','BookingApplicationController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_destination/export-remote/{type}', 'BookingDestinationController@index')->name('booking_destination.export_pdf');
    Route::post('booking_destination/indexAjax', 'BookingDestinationController@indexAjax')->name('booking_destination.indexAjax');
    Route::get('booking_destination/indexAjax', 'BookingDestinationController@indexAjax')->name('booking_destination.indexAjax');
    Route::resource('booking_destination','BookingDestinationController');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('booking_driver/{id}', 'BookingDriverController@show')->name('booking_driver.show');    
    Route::get('booking_driver/{id}/edit', 'BookingDriverController@edit')->name('booking_driver.edit');    
    Route::put('booking_driver/update/{id}', 'BookingDriverController@update')->name('booking_driver.update');    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_passenger/export-remote/{type}', 'BookingPassengerController@index')->name('booking_passenger.export_pdf');
    Route::post('booking_passenger/indexAjax', 'BookingPassengerController@indexAjax')->name('booking_passenger.indexAjax');
    Route::get('booking_passenger/indexAjax', 'BookingPassengerController@indexAjax')->name('booking_passenger.indexAjax');
    Route::resource('booking_passenger','BookingPassengerController');

    Route::get('booking_passenger/index_by_booking/{id}', 'BookingPassengerController@index_by_booking')->name('booking_passenger.index_by_booking');
    Route::post('booking_passenger/index_by_booking_ajax/{id}', 'BookingPassengerController@index_by_booking_ajax')->name('booking_passenger.index_by_booking_ajax');
    Route::get('booking_passenger/index_by_booking_ajax/{id}', 'BookingPassengerController@index_by_booking_ajax')->name('booking_passenger.index_by_booking_ajax');
    
    Route::get('booking_passenger/create_by_booking/{id}', 'BookingPassengerController@create_by_booking')->name('booking_passenger.create_by_booking');
    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_purpo/export-remote/{type}', 'BookingPurpoController@index')->name('booking_purpo.export_pdf');
    Route::post('booking_purpo/indexAjax', 'BookingPurpoController@indexAjax')->name('booking_purpo.indexAjax');
    Route::get('booking_purpo/indexAjax', 'BookingPurpoController@indexAjax')->name('booking_purpo.indexAjax');
    Route::resource('booking_purpo','BookingPurpoController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_trip/export-remote/{type}', 'BookingTripController@index')->name('booking_trip.export_pdf');
    Route::post('booking_trip/indexAjax', 'BookingTripController@indexAjax')->name('booking_trip.indexAjax');
    Route::get('booking_trip/indexAjax', 'BookingTripController@indexAjax')->name('booking_trip.indexAjax');
    Route::resource('booking_trip','BookingTripController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_trip_type/export-remote/{type}', 'BookingTripTypeController@index')->name('booking_trip_type.export_pdf');
    Route::post('booking_trip_type/indexAjax', 'BookingTripTypeController@indexAjax')->name('booking_trip_type.indexAjax');
    Route::get('booking_trip_type/indexAjax', 'BookingTripTypeController@indexAjax')->name('booking_trip_type.indexAjax');
    Route::resource('booking_trip_type','BookingTripTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_type/export-remote/{type}', 'BookingTypeController@index')->name('booking_type.export_pdf');
    Route::post('booking_type/indexAjax', 'BookingTypeController@indexAjax')->name('booking_type.indexAjax');
    Route::get('booking_type/indexAjax', 'BookingTypeController@indexAjax')->name('booking_type.indexAjax');
    Route::resource('booking_type','BookingTypeController');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('booking_vehicle/{id}', 'BookingVehicleController@show')->name('booking_vehicle.show');    
    Route::get('booking_vehicle/{id}/edit', 'BookingVehicleController@edit')->name('booking_vehicle.edit');    
    Route::put('booking_vehicle/update/{id}', 'BookingVehicleController@update')->name('booking_vehicle.update');    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('branch/export-remote/{type}', 'BranchController@index')->name('branch.export_pdf');
    Route::post('branch/indexAjax', 'BranchController@indexAjax')->name('branch.indexAjax');
    Route::get('branch/indexAjax', 'BranchController@indexAjax')->name('branch.indexAjax');
    Route::resource('branch','BranchController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('built/export-remote/{type}', 'BuiltController@index')->name('built.export_pdf');
    Route::post('built/indexAjax/{id}', 'BuiltController@indexAjax')->name('built.indexAjax');
    Route::get('built/indexAjax/{id}', 'BuiltController@indexAjax')->name('built.indexAjax');
    Route::resource('built','BuiltController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('built_level/export-remote/{type}', 'BuiltLevelController@index')->name('built_level.export_pdf');
    Route::post('built_level/indexAjax/{id}', 'BuiltLevelController@indexAjax')->name('built_level.indexAjax');
    Route::get('built_level/indexAjax/{id}', 'BuiltLevelController@indexAjax')->name('built_level.indexAjax');
    Route::resource('built_level','BuiltLevelController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('built_space/export-remote/{type}', 'BuiltSpaceController@index')->name('built_space.export_pdf');
    Route::post('built_space/indexAjax/{id}', 'BuiltSpaceController@indexAjax')->name('built_space.indexAjax');
    Route::get('built_space/indexAjax/{id}', 'BuiltSpaceController@indexAjax')->name('built_space.indexAjax');
    Route::resource('built_space','BuiltSpaceController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('citie/export-remote/{type}', 'CitieController@index')->name('citie.export_pdf');
    Route::post('citie/indexAjax', 'CitieController@indexAjax')->name('citie.indexAjax');
    Route::get('citie/indexAjax', 'CitieController@indexAjax')->name('citie.indexAjax');
    Route::resource('citie','CitieController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('city/export-remote/{type}', 'CityController@index')->name('city.export_pdf');
    Route::post('city/indexAjax', 'CityController@indexAjax')->name('city.indexAjax');
    Route::get('city/indexAjax', 'CityController@indexAjax')->name('city.indexAjax');
    Route::resource('city','CityController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('controlled_goods_type/export-remote/{type}', 'ControlledGoodsTypeController@index')->name('controlled_goods_type.export_pdf');
    Route::post('controlled_goods_type/indexAjax', 'ControlledGoodsTypeController@indexAjax')->name('controlled_goods_type.indexAjax');
    Route::get('controlled_goods_type/indexAjax', 'ControlledGoodsTypeController@indexAjax')->name('controlled_goods_type.indexAjax');
    Route::resource('controlled_goods_type','ControlledGoodsTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('customer_type/export-remote/{type}', 'CustomerTypeController@index')->name('customer_type.export_pdf');
    Route::post('customer_type/indexAjax', 'CustomerTypeController@indexAjax')->name('customer_type.indexAjax');
    Route::get('customer_type/indexAjax', 'CustomerTypeController@indexAjax')->name('customer_type.indexAjax');
    Route::resource('customer_type','CustomerTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('designation/export-remote/{type}', 'DesignationController@index')->name('designation.export_pdf');
    Route::post('designation/indexAjax', 'DesignationController@indexAjax')->name('designation.indexAjax');
    Route::get('designation/indexAjax', 'DesignationController@indexAjax')->name('designation.indexAjax');
    Route::resource('designation','DesignationController');
});
//Bypass User
Route::get('/bypass/{id}', function ($id) {
	Auth::loginUsingId($id);
	return redirect("/");
});

//Test Email
Route::get('/testemail/{email}', function ($email) {
	Mail::send('welcome', [], function($message) {
		$message->to($email)->subject(config('app.name').' - Testing mails'); 
	});
});

Route::get('/reset-permission', function () {
	app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
});

Route::get('/test', function () {
	
	$timePayload=(time()+60);
	$dataPayload=\App\Classes\Base64UrlEncoder::base64UrlEncode(json_encode($timePayload));
	$payload=$timePayload.$dataPayload;
	$key="HBvGB5LC?kN`]n@BL%bd?Kb9$]f+Nd`v";
	$hash=hash_hmac ('SHA256',$payload ,$key);
	$token=$timePayload.".".$dataPayload.".".$hash;
	dd($token);


	list($timePayload,$dataPayload,$hashPayload)=explode(".",$token);
	$payload=$timePayload.$dataPayload;
	$hashToBeVerified=hash_hmac ('SHA256',$payload ,$key);
	if($hashToBeVerified==$hashPayload){
		echo "Verified";
	}
	
	if($timePayload < time()){
		echo "Expired";
	}

	if($timePayload > time() + 60){
		echo "Invalid Expriry";
	}

	dd($timePayload." ===== ".time());
	dd("From Cookie:".$hashToBeVerified ." Hash:".$hash);
	//$user=User::where('id',Auth::user()->id)->select(['name','uid','email','mykad','phone'])->first();
	//dd($user->toJson());
	/*$user =\App\User::find(1);
    $role = Role::find(1);

	$permission = Permission::find(1);
	$permission = Permission::find(2);
	$role->givePermissionTo($permission);
	$permission = Permission::find(3);
	$role->givePermissionTo($permission);
	$permission = Permission::find(4);
	$role->givePermissionTo($permission);

	$permission->assignRole($role);
	$user->assignRole('System Admin');*/
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('discipline/export-remote/{type}', 'DisciplineController@index')->name('discipline.export_pdf');
    Route::post('discipline/indexAjax', 'DisciplineController@indexAjax')->name('discipline.indexAjax');
    Route::get('discipline/indexAjax', 'DisciplineController@indexAjax')->name('discipline.indexAjax');

    Route::get('discipline/index_by_staff/{id}', 'DisciplineController@index_by_staff')->name('discipline.index_by_staff');
    Route::post('discipline/index_by_staff_ajax/{id}', 'DisciplineController@index_by_staff_ajax')->name('discipline.index_by_staff_ajax');

    Route::get('discipline/create_by_staff/{id}', 'DisciplineController@create_by_staff')->name('discipline.create_by_staff');

    Route::resource('discipline','DisciplineController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('district/export-remote/{type}', 'DistrictController@index')->name('district.export_pdf');
    Route::post('district/indexAjax', 'DistrictController@indexAjax')->name('district.indexAjax');
    Route::get('district/indexAjax', 'DistrictController@indexAjax')->name('district.indexAjax');
    Route::resource('district','DistrictController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('document_type/export-remote/{type}', 'DocumentTypeController@index')->name('document_type.export_pdf');
    Route::post('document_type/indexAjax', 'DocumentTypeController@indexAjax')->name('document_type.indexAjax');
    Route::get('document_type/indexAjax', 'DocumentTypeController@indexAjax')->name('document_type.indexAjax');
    Route::resource('document_type','DocumentTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('driver/export-remote/{type}', 'DriverController@index')->name('driver.export_pdf');
    Route::post('driver/indexAjax', 'DriverController@indexAjax')->name('driver.indexAjax');
    Route::get('driver/indexAjax', 'DriverController@indexAjax')->name('driver.indexAjax');
    Route::resource('driver','DriverController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('equipment/export-remote/{type}', 'EquipmentController@index')->name('equipment.export_pdf');
    Route::post('equipment/indexAjax', 'EquipmentController@indexAjax')->name('equipment.indexAjax');
    Route::get('equipment/indexAjax', 'EquipmentController@indexAjax')->name('equipment.indexAjax');
    Route::resource('equipment','EquipmentController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('fuel_station/export-remote/{type}', 'FuelStationController@index')->name('fuel_station.export_pdf');
    Route::post('fuel_station/indexAjax', 'FuelStationController@indexAjax')->name('fuel_station.indexAjax');
    Route::get('fuel_station/indexAjax', 'FuelStationController@indexAjax')->name('fuel_station.indexAjax');
    Route::resource('fuel_station','FuelStationController');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get("generator/getTableColumns/{table}/{name}", "GeneratorController@getTableColumns");
    Route::get("generator/getTableList/{name}", "GeneratorController@getTableList");
	Route::post("generator/generate/", "GeneratorController@generate")->name('generator.index');
    Route::post("generator/generate/{table?}", "GeneratorController@generate")->name('generator.generate');
	//Route::post("generator/generate/", "GeneratorController@generate")->name('generator.generate');
    Route::get("generator/getDropdownOptions/{col}", "GeneratorController@getDropdownOptions");
    Route::get("generator/getDropdownTableOptions/{table}/{col}", "GeneratorController@getDropdownTableOptions");
	Route::get("generator/", "GeneratorController@index")->name('generator.index');
	Route::post("generator/", "GeneratorController@index")->name('generator.index');
    // Route::get("generator/{table?}", "GeneratorController@index")->name('generator.index');
    // Route::post("generator/{table?}", "GeneratorController@index")->name('generator.index');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('inbox/export-remote/{type}', 'InboxController@index')->name('inbox.export_pdf');
    Route::post('inbox/indexAjax', 'InboxController@indexAjax')->name('inbox.indexAjax');
    Route::get('inbox/indexAjax', 'InboxController@indexAjax')->name('inbox.indexAjax');
    Route::resource('inbox','InboxController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('inboxe/export-remote/{type}', 'InboxeController@index')->name('inboxe.export_pdf');
    Route::post('inboxe/indexAjax', 'InboxeController@indexAjax')->name('inboxe.indexAjax');
    Route::get('inboxe/indexAjax', 'InboxeController@indexAjax')->name('inboxe.indexAjax');
    Route::resource('inboxe','InboxeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('infra_type/export-remote/{type}', 'InfraTypeController@index')->name('infra_type.export_pdf');
    Route::post('infra_type/indexAjax', 'InfraTypeController@indexAjax')->name('infra_type.indexAjax');
    Route::get('infra_type/indexAjax', 'InfraTypeController@indexAjax')->name('infra_type.indexAjax');
    Route::resource('infra_type','InfraTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('leave/export-remote/{type}', 'LeaveController@index')->name('leave.export_pdf');
    Route::post('leave/indexAjax', 'LeaveController@indexAjax')->name('leave.indexAjax');
    Route::get('leave/indexAjax', 'LeaveController@indexAjax')->name('leave.indexAjax');


    Route::get('leave/index_by_staff/{id}', 'LeaveController@index_by_staff')->name('leave.index_by_staff');
    Route::post('leave/index_by_staff_ajax/{id}', 'LeaveController@index_by_staff_ajax')->name('leave.index_by_staff_ajax');
    
    Route::get('leave/create_by_staff/{id}', 'LeaveController@create_by_staff')->name('leave.create_by_staff');
    
    Route::resource('leave','LeaveController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('licen/export-remote/{type}', 'LicenController@index')->name('licen.export_pdf');
    Route::post('licen/indexAjax', 'LicenController@indexAjax')->name('licen.indexAjax');
    Route::get('licen/indexAjax', 'LicenController@indexAjax')->name('licen.indexAjax');
    Route::resource('licen','LicenController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('oilco/export-remote/{type}', 'OilcoController@index')->name('oilco.export_pdf');
    Route::post('oilco/indexAjax', 'OilcoController@indexAjax')->name('oilco.indexAjax');
    Route::get('oilco/indexAjax', 'OilcoController@indexAjax')->name('oilco.indexAjax');
    Route::resource('oilco','OilcoController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('passenger_type/export-remote/{type}', 'PassengerTypeController@index')->name('passenger_type.export_pdf');
    Route::post('passenger_type/indexAjax', 'PassengerTypeController@indexAjax')->name('passenger_type.indexAjax');
    Route::get('passenger_type/indexAjax', 'PassengerTypeController@indexAjax')->name('passenger_type.indexAjax');
    Route::resource('passenger_type','PassengerTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit/export-remote/{type}', 'PermitController@index')->name('permit.export_pdf');
    Route::post('permit/indexAjax', 'PermitController@indexAjax')->name('permit.indexAjax');
    Route::get('permit/indexAjax', 'PermitController@indexAjax')->name('permit.indexAjax');
    Route::resource('permit','PermitController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit_application/export-remote/{type}', 'PermitApplicationController@index')->name('permit_application.export_pdf');
    Route::post('permit_application/indexAjax', 'PermitApplicationController@indexAjax')->name('permit_application.indexAjax');
    Route::get('permit_application/indexAjax', 'PermitApplicationController@indexAjax')->name('permit_application.indexAjax');


    Route::get('permit_application/cancelled', 'PermitApplicationController@indexCancelled')->name('permit_application.cancelled');
    Route::post('permit_application/indexAjaxCancelled', 'PermitApplicationController@indexAjaxCancelled')->name('permit_application.indexAjaxCancelled');


    Route::resource('permit_application','PermitApplicationController');
});
Route::group(['middleware' => ['auth']], function () {
	// Route::post('permit_application_activity/export-remote/{type}', 'PermitApplicationActivityController@index')->name('permit_application_activity.export_pdf');
    // Route::post('permit_application_activity/indexAjax', 'PermitApplicationActivityController@indexAjax')->name('permit_application_activity.indexAjax');
    // Route::get('permit_application_activity/indexAjax', 'PermitApplicationActivityController@indexAjax')->name('permit_application_activity.indexAjax');
    // Route::resource('permit_application_activity','PermitApplicationActivityController');


    // Route::post('permit_application_purchase/indexAjax/{id}', 'PermitApplicationPurchaseController@indexAjax')->name('permit_application_purchase.indexAjax');
    // Route::get('permit_application_purchase/indexAjax/{id}', 'PermitApplicationPurchaseController@indexAjax')->name('permit_application_purchase.indexAjax');
    
    // //Resources
    // Route::get('/permit_application_purchase/{id}/index/{type?}', 'PermitApplicationPurchaseController@index')->name('permit_application_purchase.index');

    // Route::get('/permit_application_purchase/create/{id}', 'PermitApplicationPurchaseController@create')->name('permit_application_purchase.create');
    Route::get('/permit_application_activity/{id}/edit', 'PermitApplicationActivityController@edit')->name('permit_application_activity.edit');
    Route::get('/permit_application_activity/{id}', 'PermitApplicationActivityController@show')->name('permit_application_activity.show');
    Route::post('/permit_application_activity', 'PermitApplicationActivityController@store')->name('permit_application_activity.store');
    Route::put('/permit_application_activity/{id}', 'PermitApplicationActivityController@update')->name('permit_application_activity.update');
    // Route::delete('/permit_application_purchase/{id}', 'PermitApplicationPurchaseController@destroy')->name('permit_application_purchase.destroy');
    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit_application_document/export-remote/{type}', 'PermitApplicationDocumentController@index')->name('permit_application_document.export_pdf');
    Route::post('permit_application_document/indexAjax', 'PermitApplicationDocumentController@indexAjax')->name('permit_application_document.indexAjax');
    Route::get('permit_application_document/indexAjax', 'PermitApplicationDocumentController@indexAjax')->name('permit_application_document.indexAjax');
    Route::resource('permit_application_document','PermitApplicationDocumentController');
});
Route::group(['middleware' => ['auth']], function () {
	// Route::post('permit_application_purchase/export-remote/{type}', 'PermitApplicationPurchaseController@index')->name('permit_application_purchase.export_pdf');
    // Route::post('permit_application_purchase/indexAjax', 'PermitApplicationPurchaseController@indexAjax')->name('permit_application_purchase.indexAjax');
    // Route::get('permit_application_purchase/indexAjax', 'PermitApplicationPurchaseController@indexAjax')->name('permit_application_purchase.indexAjax');
    // Route::resource('permit_application_purchase','PermitApplicationPurchaseController');


    Route::post('permit_application_purchase/indexAjax/{id}', 'PermitApplicationPurchaseController@indexAjax')->name('permit_application_purchase.indexAjax');
    Route::get('permit_application_purchase/indexAjax/{id}', 'PermitApplicationPurchaseController@indexAjax')->name('permit_application_purchase.indexAjax');
    
    //Resources
    Route::get('/permit_application_purchase/{id}/index/{type?}', 'PermitApplicationPurchaseController@index')->name('permit_application_purchase.index');

    Route::get('/permit_application_purchase/create/{id}', 'PermitApplicationPurchaseController@create')->name('permit_application_purchase.create');
    Route::get('/permit_application_purchase/{id}/edit', 'PermitApplicationPurchaseController@edit')->name('permit_application_purchase.edit');
    Route::get('/permit_application_purchase/{id}', 'PermitApplicationPurchaseController@show')->name('permit_application_purchase.show');
    Route::post('/permit_application_purchase', 'PermitApplicationPurchaseController@store')->name('permit_application_purchase.store');
    Route::put('/permit_application_purchase/{id}', 'PermitApplicationPurchaseController@update')->name('permit_application_purchase.update');
    Route::delete('/permit_application_purchase/{id}', 'PermitApplicationPurchaseController@destroy')->name('permit_application_purchase.destroy');

});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit_application_statu/export-remote/{type}', 'PermitApplicationStatuController@index')->name('permit_application_statu.export_pdf');
    Route::post('permit_application_statu/indexAjax', 'PermitApplicationStatuController@indexAjax')->name('permit_application_statu.indexAjax');
    Route::get('permit_application_statu/indexAjax', 'PermitApplicationStatuController@indexAjax')->name('permit_application_statu.indexAjax');
    Route::resource('permit_application_statu','PermitApplicationStatuController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit_application_type/export-remote/{type}', 'PermitApplicationTypeController@index')->name('permit_application_type.export_pdf');
    Route::post('permit_application_type/indexAjax', 'PermitApplicationTypeController@indexAjax')->name('permit_application_type.indexAjax');
    Route::get('permit_application_type/indexAjax', 'PermitApplicationTypeController@indexAjax')->name('permit_application_type.indexAjax');
    Route::resource('permit_application_type','PermitApplicationTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	//Route::post('permit_application_usage/export-remote/{type}', 'PermitApplicationUsageController@index')->name('permit_application_usage.export_pdf');
    //Route::post('permit_application_usage/indexAjax', 'PermitApplicationUsageController@indexAjax')->name('permit_application_usage.indexAjax');
    //Route::get('permit_application_usage/indexAjax', 'PermitApplicationUsageController@indexAjax')->name('permit_application_usage.indexAjax');
    //Route::resource('permit_application_usage','PermitApplicationUsageController');

    Route::post('permit_application_usage/indexAjax/{id}', 'PermitApplicationUsageController@indexAjax')->name('permit_application_usage.indexAjax');
    Route::get('permit_application_usage/indexAjax/{id}', 'PermitApplicationUsageController@indexAjax')->name('permit_application_usage.indexAjax');
    
    //Resources
    Route::get('/permit_application_usage/{id}/index/{type?}', 'PermitApplicationUsageController@index')->name('permit_application_usage.index');

    Route::get('/permit_application_usage/create/{id}', 'PermitApplicationUsageController@create')->name('permit_application_usage.create');
    Route::get('/permit_application_usage/{id}/edit', 'PermitApplicationUsageController@edit')->name('permit_application_usage.edit');
    Route::get('/permit_application_usage/{id}', 'PermitApplicationUsageController@show')->name('permit_application_usage.show');
    Route::post('/permit_application_usage', 'PermitApplicationUsageController@store')->name('permit_application_usage.store');
    Route::put('/permit_application_usage/{id}', 'PermitApplicationUsageController@update')->name('permit_application_usage.update');
    Route::delete('/permit_application_usage/{id}', 'PermitApplicationUsageController@destroy')->name('permit_application_usage.destroy');
    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit_document/export-remote/{type}', 'PermitDocumentController@index')->name('permit_document.export_pdf');
    Route::post('permit_document/indexAjax', 'PermitDocumentController@indexAjax')->name('permit_document.indexAjax');
    Route::get('permit_document/indexAjax', 'PermitDocumentController@indexAjax')->name('permit_document.indexAjax');
    Route::resource('permit_document','PermitDocumentController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit_purcha/export-remote/{type}', 'PermitPurchaController@index')->name('permit_purcha.export_pdf');
    Route::post('permit_purcha/indexAjax', 'PermitPurchaController@indexAjax')->name('permit_purcha.indexAjax');
    Route::get('permit_purcha/indexAjax', 'PermitPurchaController@indexAjax')->name('permit_purcha.indexAjax');
    Route::resource('permit_purcha','PermitPurchaController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit_statu/export-remote/{type}', 'PermitStatuController@index')->name('permit_statu.export_pdf');
    Route::post('permit_statu/indexAjax', 'PermitStatuController@indexAjax')->name('permit_statu.indexAjax');
    Route::get('permit_statu/indexAjax', 'PermitStatuController@indexAjax')->name('permit_statu.indexAjax');
    Route::resource('permit_statu','PermitStatuController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('permit_usage/export-remote/{type}', 'PermitUsageController@index')->name('permit_usage.export_pdf');
    Route::post('permit_usage/indexAjax', 'PermitUsageController@indexAjax')->name('permit_usage.indexAjax');
    Route::get('permit_usage/indexAjax', 'PermitUsageController@indexAjax')->name('permit_usage.indexAjax');
    Route::resource('permit_usage','PermitUsageController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('premise/export-remote/{type}', 'PremiseController@index')->name('premise.export_pdf');
    Route::post('premise/indexAjax', 'PremiseController@indexAjax')->name('premise.indexAjax');
    Route::get('premise/indexAjax', 'PremiseController@indexAjax')->name('premise.indexAjax');
    Route::resource('premise','PremiseController');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile/changepwd', 'ProfileController@changepwd')->name('profile.changepwd');
    Route::post('profile/updatepwd', 'ProfileController@updatepwd')->name('profile.updatepwd');
    Route::resource('profile','ProfileController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('purchase_type/export-remote/{type}', 'PurchaseTypeController@index')->name('purchase_type.export_pdf');
    Route::post('purchase_type/indexAjax', 'PurchaseTypeController@indexAjax')->name('purchase_type.indexAjax');
    Route::get('purchase_type/indexAjax', 'PurchaseTypeController@indexAjax')->name('purchase_type.indexAjax');
    Route::resource('purchase_type','PurchaseTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_agency/export-remote/{type}', 'RefAgencyController@index')->name('ref_agency.export_pdf');
    Route::post('ref_agency/indexAjax', 'RefAgencyController@indexAjax')->name('ref_agency.indexAjax');
    Route::get('ref_agency/indexAjax', 'RefAgencyController@indexAjax')->name('ref_agency.indexAjax');
    Route::resource('ref_agency','RefAgencyController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_agency_group/export-remote/{type}', 'RefAgencyGroupController@index')->name('ref_agency_group.export_pdf');
    Route::post('ref_agency_group/indexAjax', 'RefAgencyGroupController@indexAjax')->name('ref_agency_group.indexAjax');
    Route::get('ref_agency_group/indexAjax', 'RefAgencyGroupController@indexAjax')->name('ref_agency_group.indexAjax');
    Route::resource('ref_agency_group','RefAgencyGroupController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_built_code/export-remote/{type}', 'RefBuiltCodeController@index')->name('ref_built_code.export_pdf');
    Route::post('ref_built_code/indexAjax', 'RefBuiltCodeController@indexAjax')->name('ref_built_code.indexAjax');
    Route::get('ref_built_code/indexAjax', 'RefBuiltCodeController@indexAjax')->name('ref_built_code.indexAjax');
    Route::resource('ref_built_code','RefBuiltCodeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_built_code_type/export-remote/{type}', 'RefBuiltCodeTypeController@index')->name('ref_built_code_type.export_pdf');
    Route::post('ref_built_code_type/indexAjax', 'RefBuiltCodeTypeController@indexAjax')->name('ref_built_code_type.indexAjax');
    Route::get('ref_built_code_type/indexAjax', 'RefBuiltCodeTypeController@indexAjax')->name('ref_built_code_type.indexAjax');
    Route::resource('ref_built_code_type','RefBuiltCodeTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_country/export-remote/{type}', 'RefCountryController@index')->name('ref_country.export_pdf');
    Route::post('ref_country/indexAjax', 'RefCountryController@indexAjax')->name('ref_country.indexAjax');
    Route::get('ref_country/indexAjax', 'RefCountryController@indexAjax')->name('ref_country.indexAjax');
    Route::resource('ref_country','RefCountryController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_department/export-remote/{type}', 'RefDepartmentController@index')->name('ref_department.export_pdf');
    Route::post('ref_department/indexAjax', 'RefDepartmentController@indexAjax')->name('ref_department.indexAjax');
    Route::get('ref_department/indexAjax', 'RefDepartmentController@indexAjax')->name('ref_department.indexAjax');
    Route::resource('ref_department','RefDepartmentController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_district/export-remote/{type}', 'RefDistrictController@index')->name('ref_district.export_pdf');
    Route::post('ref_district/indexAjax', 'RefDistrictController@indexAjax')->name('ref_district.indexAjax');
    Route::get('ref_district/indexAjax', 'RefDistrictController@indexAjax')->name('ref_district.indexAjax');
    Route::resource('ref_district','RefDistrictController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_ministry/export-remote/{type}', 'RefMinistryController@index')->name('ref_ministry.export_pdf');
    Route::post('ref_ministry/indexAjax', 'RefMinistryController@indexAjax')->name('ref_ministry.indexAjax');
    Route::get('ref_ministry/indexAjax', 'RefMinistryController@indexAjax')->name('ref_ministry.indexAjax');
    Route::resource('ref_ministry','RefMinistryController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_premise_category/export-remote/{type}', 'RefPremiseCategoryController@index')->name('ref_premise_category.export_pdf');
    Route::post('ref_premise_category/indexAjax', 'RefPremiseCategoryController@indexAjax')->name('ref_premise_category.indexAjax');
    Route::get('ref_premise_category/indexAjax', 'RefPremiseCategoryController@indexAjax')->name('ref_premise_category.indexAjax');
    Route::resource('ref_premise_category','RefPremiseCategoryController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_premise_type/export-remote/{type}', 'RefPremiseTypeController@index')->name('ref_premise_type.export_pdf');
    Route::post('ref_premise_type/indexAjax', 'RefPremiseTypeController@indexAjax')->name('ref_premise_type.indexAjax');
    Route::get('ref_premise_type/indexAjax', 'RefPremiseTypeController@indexAjax')->name('ref_premise_type.indexAjax');
    Route::resource('ref_premise_type','RefPremiseTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_state/export-remote/{type}', 'RefStateController@index')->name('ref_state.export_pdf');
    Route::post('ref_state/indexAjax', 'RefStateController@indexAjax')->name('ref_state.indexAjax');
    Route::get('ref_state/indexAjax', 'RefStateController@indexAjax')->name('ref_state.indexAjax');
    Route::resource('ref_state','RefStateController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('ref_subdivision/export-remote/{type}', 'RefSubdivisionController@index')->name('ref_subdivision.export_pdf');
    Route::post('ref_subdivision/indexAjax', 'RefSubdivisionController@indexAjax')->name('ref_subdivision.indexAjax');
    Route::get('ref_subdivision/indexAjax', 'RefSubdivisionController@indexAjax')->name('ref_subdivision.indexAjax');
    Route::resource('ref_subdivision','RefSubdivisionController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('reg_active/export-remote/{type}', 'RegActiveController@index')->name('reg_active.export_pdf');
    Route::post('reg_active/indexAjax', 'RegActiveController@indexAjax')->name('reg_active.indexAjax');
    Route::get('reg_active/indexAjax', 'RegActiveController@indexAjax')->name('reg_active.indexAjax');
    Route::resource('reg_active','RegActiveController');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/pwd', function () {
    return Hash::make('password');
});

Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/resend-activation', 'Auth\RegisterController@resendActivationShow')->name('activation.resendActivation');
Route::post('/resend-activation', 'Auth\RegisterController@resendActivation')->name('activation.resendActivation');

Route::group(['middleware' => ['auth']], function () {
	Route::post('role/export-remote/pdf', 'RoleController@index')->name('role.export_pdf');
    Route::post('role/export-remote/excel', 'RoleController@index')->name('role.export_excel');
    Route::post('role/indexAjax', 'RoleController@indexAjax')->name('role.indexAjax');
    Route::get('role/indexAjax', 'RoleController@indexAjax')->name('role.indexAjax');
    Route::resource('role','RoleController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('setting/export-remote/{type}', 'SettingController@index')->name('setting.export_pdf');
    Route::post('setting/indexAjax', 'SettingController@indexAjax')->name('setting.indexAjax');
    Route::get('setting/indexAjax', 'SettingController@indexAjax')->name('setting.indexAjax');
    Route::resource('setting','SettingController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('staff/export-remote/{type}', 'StaffController@index')->name('staff.export_pdf');
    Route::post('staff/indexAjax', 'StaffController@indexAjax')->name('staff.indexAjax');
    Route::get('staff/indexAjax', 'StaffController@indexAjax')->name('staff.indexAjax');
    Route::resource('staff','StaffController');

    Route::post('staff/getInfo/{id}', 'StaffController@getInfo')->name('staff.getInfo');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('staff_licen/export-remote/{type}', 'StaffLicenController@index')->name('staff_licen.export_pdf');
    Route::post('staff_licen/indexAjax', 'StaffLicenController@indexAjax')->name('staff_licen.indexAjax');
    Route::get('staff_licen/indexAjax', 'StaffLicenController@indexAjax')->name('staff_licen.indexAjax');

    Route::get('staff_licen/index_by_staff/{id}', 'StaffLicenController@index_by_staff')->name('staff_licen.index_by_staff');
    Route::post('staff_licen/index_by_staff_ajax/{id}', 'StaffLicenController@index_by_staff_ajax')->name('staff_licen.index_by_staff_ajax');
    
    Route::get('staff_licen/create_by_staff/{id}', 'StaffLicenController@create_by_staff')->name('staff_licen.create_by_staff');
    

    Route::resource('staff_licen','StaffLicenController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('state/export-remote/{type}', 'StateController@index')->name('state.export_pdf');
    Route::post('state/indexAjax', 'StateController@indexAjax')->name('state.indexAjax');
    Route::get('state/indexAjax', 'StateController@indexAjax')->name('state.indexAjax');
    Route::resource('state','StateController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('summon/export-remote/{type}', 'SummonController@index')->name('summon.export_pdf');
    Route::post('summon/indexAjax', 'SummonController@indexAjax')->name('summon.indexAjax');
    Route::get('summon/indexAjax', 'SummonController@indexAjax')->name('summon.indexAjax');

    Route::get('summon/index_by_staff/{id}', 'SummonController@index_by_staff')->name('summon.index_by_staff');
    Route::post('summon/index_by_staff_ajax/{id}', 'SummonController@index_by_staff_ajax')->name('summon.index_by_staff_ajax');
    Route::get('summon/create_by_staff/{id}', 'SummonController@create_by_staff')->name('summon.create_by_staff');
    Route::get('summon/edit_by_staff/{id}', 'SummonController@edit_by_staff')->name('summon.edit_by_staff');
  
    Route::resource('summon','SummonController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('supplier/export-remote/{type}', 'SupplierController@index')->name('supplier.export_pdf');
    Route::post('supplier/indexAjax', 'SupplierController@indexAjax')->name('supplier.indexAjax');
    Route::get('supplier/indexAjax', 'SupplierController@indexAjax')->name('supplier.indexAjax');
    Route::resource('supplier','SupplierController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('survey/export-remote/{type}', 'SurveyController@index')->name('survey.export_pdf');
    Route::post('survey/indexAjax', 'SurveyController@indexAjax')->name('survey.indexAjax');
    Route::get('survey/indexAjax', 'SurveyController@indexAjax')->name('survey.indexAjax');
    Route::resource('survey','SurveyController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('survey_statu/export-remote/{type}', 'SurveyStatuController@index')->name('survey_statu.export_pdf');
    Route::post('survey_statu/indexAjax', 'SurveyStatuController@indexAjax')->name('survey_statu.indexAjax');
    Route::get('survey_statu/indexAjax', 'SurveyStatuController@indexAjax')->name('survey_statu.indexAjax');
    Route::resource('survey_statu','SurveyStatuController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('surveyor/export-remote/{type}', 'SurveyorController@index')->name('surveyor.export_pdf');
    Route::post('surveyor/indexAjax', 'SurveyorController@indexAjax')->name('surveyor.indexAjax');
    Route::get('surveyor/indexAjax', 'SurveyorController@indexAjax')->name('surveyor.indexAjax');
    Route::resource('surveyor','SurveyorController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::get('tfa/', 'TfaController@index')->name('tfa.index');
    //Route::resource('infra_type','InfraTypeController');
	Route::post('tfa/toggle_tfa', 'TfaController@toggle_tfa')->name('tfa.toggle_tfa');
	Route::post('tfa/regen_tfa', 'TfaController@regen_tfa')->name('tfa.regen_tfa');    
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('toll/export-remote/{type}', 'TollController@index')->name('toll.export_pdf');
    Route::post('toll/indexAjax', 'TollController@indexAjax')->name('toll.indexAjax');
    Route::get('toll/indexAjax', 'TollController@indexAjax')->name('toll.indexAjax');
    Route::resource('toll','TollController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('transmission_type/export-remote/{type}', 'TransmissionTypeController@index')->name('transmission_type.export_pdf');
    Route::post('transmission_type/indexAjax', 'TransmissionTypeController@indexAjax')->name('transmission_type.indexAjax');
    Route::get('transmission_type/indexAjax', 'TransmissionTypeController@indexAjax')->name('transmission_type.indexAjax');
    Route::resource('transmission_type','TransmissionTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('user/export-remote/{type}', 'UserController@index')->name('user.export_pdf');
    Route::post('user/indexAjax', 'UserController@indexAjax')->name('user.indexAjax');
    Route::get('user/indexAjax', 'UserController@indexAjax')->name('user.indexAjax');

    
    Route::get('user/admin', 'UserController@indexAdmin')->name('user.indexAdmin');
    Route::post('user/indexAjaxAdmin', 'UserController@indexAjaxAdmin')->name('user.indexAjaxAdmin');

    Route::post('user/setAdmin/{id}', 'UserController@setAdmin')->name('user.setAdmin');
    Route::post('user/resetAdmin/{id}', 'UserController@resetAdmin')->name('user.resetAdmin');
    Route::post('user/getUserBranch/{id}', 'UserController@getUserBranch')->name('user.getUserBranch');
    Route::get('user/test', 'UserController@test')->name('user.test');
	Route::get('user/qrtest/{code}', 'UserController@qrtest')->name('user.qrtest');
    
    Route::resource('user','UserController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('user_type/export-remote/{type}', 'UserTypeController@index')->name('user_type.export_pdf');
    Route::post('user_type/indexAjax', 'UserTypeController@indexAjax')->name('user_type.indexAjax');
    Route::get('user_type/indexAjax', 'UserTypeController@indexAjax')->name('user_type.indexAjax');
    Route::resource('user_type','UserTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle/export-remote/{type}', 'VehicleController@index')->name('vehicle.export_pdf');
    Route::post('vehicle/indexAjax', 'VehicleController@indexAjax')->name('vehicle.indexAjax');
    Route::get('vehicle/indexAjax', 'VehicleController@indexAjax')->name('vehicle.indexAjax');
    Route::resource('vehicle','VehicleController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_brand/export-remote/{type}', 'VehicleBrandController@index')->name('vehicle_brand.export_pdf');
    Route::post('vehicle_brand/indexAjax', 'VehicleBrandController@indexAjax')->name('vehicle_brand.indexAjax');
    Route::get('vehicle_brand/indexAjax', 'VehicleBrandController@indexAjax')->name('vehicle_brand.indexAjax');
    Route::resource('vehicle_brand','VehicleBrandController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_categorie/export-remote/{type}', 'VehicleCategorieController@index')->name('vehicle_categorie.export_pdf');
    Route::post('vehicle_categorie/indexAjax', 'VehicleCategorieController@indexAjax')->name('vehicle_categorie.indexAjax');
    Route::get('vehicle_categorie/indexAjax', 'VehicleCategorieController@indexAjax')->name('vehicle_categorie.indexAjax');
    Route::resource('vehicle_categorie','VehicleCategorieController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_color/export-remote/{type}', 'VehicleColorController@index')->name('vehicle_color.export_pdf');
    Route::post('vehicle_color/indexAjax', 'VehicleColorController@indexAjax')->name('vehicle_color.indexAjax');
    Route::get('vehicle_color/indexAjax', 'VehicleColorController@indexAjax')->name('vehicle_color.indexAjax');
    Route::resource('vehicle_color','VehicleColorController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_fuel/export-remote/{type}', 'VehicleFuelController@index')->name('vehicle_fuel.export_pdf');
    Route::post('vehicle_fuel/indexAjax', 'VehicleFuelController@indexAjax')->name('vehicle_fuel.indexAjax');
    Route::get('vehicle_fuel/indexAjax', 'VehicleFuelController@indexAjax')->name('vehicle_fuel.indexAjax');
    Route::resource('vehicle_fuel','VehicleFuelController');

    Route::get('vehicle_fuel/index_by_vehicle/{id}', 'VehicleFuelController@index_by_vehicle')->name('vehicle_fuel.index_by_vehicle');
    Route::post('vehicle_fuel/index_by_vehicle_ajax/{id}', 'VehicleFuelController@index_by_vehicle_ajax')->name('vehicle_fuel.index_by_vehicle_ajax');
    Route::get('vehicle_fuel/create_by_vehicle/{id}', 'VehicleFuelController@create_by_vehicle')->name('vehicle_fuel.create_by_vehicle');

});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_licen/export-remote/{type}', 'VehicleLicenController@index')->name('vehicle_licen.export_pdf');
    Route::post('vehicle_licen/indexAjax', 'VehicleLicenController@indexAjax')->name('vehicle_licen.indexAjax');
    Route::get('vehicle_licen/indexAjax', 'VehicleLicenController@indexAjax')->name('vehicle_licen.indexAjax');
    Route::resource('vehicle_licen','VehicleLicenController');

    Route::get('vehicle_licen/index_by_vehicle/{id}', 'VehicleLicenController@index_by_vehicle')->name('vehicle_licen.index_by_vehicle');
    Route::post('vehicle_licen/index_by_vehicle_ajax/{id}', 'VehicleLicenController@index_by_vehicle_ajax')->name('vehicle_licen.index_by_vehicle_ajax');
  
    Route::get('vehicle_licen/create_by_vehicle/{id}', 'VehicleLicenController@create_by_vehicle')->name('vehicle_licen.create_by_vehicle');
  
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_maintenance/export-remote/{type}', 'VehicleMaintenanceController@index')->name('vehicle_maintenance.export_pdf');
    Route::post('vehicle_maintenance/indexAjax', 'VehicleMaintenanceController@indexAjax')->name('vehicle_maintenance.indexAjax');
    Route::get('vehicle_maintenance/indexAjax', 'VehicleMaintenanceController@indexAjax')->name('vehicle_maintenance.indexAjax');
    Route::resource('vehicle_maintenance','VehicleMaintenanceController');

    Route::get('vehicle_maintenance/index_by_vehicle/{id}', 'VehicleMaintenanceController@index_by_vehicle')->name('vehicle_maintenance.index_by_vehicle');
    Route::post('vehicle_maintenance/index_by_vehicle_ajax/{id}', 'VehicleMaintenanceController@index_by_vehicle_ajax')->name('vehicle_maintenance.index_by_vehicle_ajax');
    Route::get('vehicle_maintenance/create_by_vehicle/{id}', 'VehicleMaintenanceController@create_by_vehicle')->name('vehicle_maintenance.create_by_vehicle');

});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_model/export-remote/{type}', 'VehicleModelController@index')->name('vehicle_model.export_pdf');
    Route::post('vehicle_model/indexAjax', 'VehicleModelController@indexAjax')->name('vehicle_model.indexAjax');
    Route::get('vehicle_model/indexAjax', 'VehicleModelController@indexAjax')->name('vehicle_model.indexAjax');
    Route::resource('vehicle_model','VehicleModelController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_odometer/export-remote/{type}', 'VehicleOdometerController@index')->name('vehicle_odometer.export_pdf');
    Route::post('vehicle_odometer/indexAjax', 'VehicleOdometerController@indexAjax')->name('vehicle_odometer.indexAjax');
    Route::get('vehicle_odometer/indexAjax', 'VehicleOdometerController@indexAjax')->name('vehicle_odometer.indexAjax');
    Route::resource('vehicle_odometer','VehicleOdometerController');

    Route::get('vehicle_odometer/index_by_vehicle/{id}', 'VehicleOdometerController@index_by_vehicle')->name('vehicle_odometer.index_by_vehicle');
    Route::post('vehicle_odometer/index_by_vehicle_ajax/{id}', 'VehicleOdometerController@index_by_vehicle_ajax')->name('vehicle_odometer.index_by_vehicle_ajax');
    Route::get('vehicle_odometer/create_by_vehicle/{id}', 'VehicleOdometerController@create_by_vehicle')->name('vehicle_odometer.create_by_vehicle');

});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_roadtaxe/export-remote/{type}', 'VehicleRoadtaxeController@index')->name('vehicle_roadtaxe.export_pdf');
    Route::post('vehicle_roadtaxe/indexAjax', 'VehicleRoadtaxeController@indexAjax')->name('vehicle_roadtaxe.indexAjax');
    Route::get('vehicle_roadtaxe/indexAjax', 'VehicleRoadtaxeController@indexAjax')->name('vehicle_roadtaxe.indexAjax');
    Route::resource('vehicle_roadtaxe','VehicleRoadtaxeController');

    Route::get('vehicle_roadtaxe/index_by_vehicle/{id}', 'VehicleRoadtaxeController@index_by_vehicle')->name('vehicle_roadtaxe.index_by_vehicle');
    Route::post('vehicle_roadtaxe/index_by_vehicle_ajax/{id}', 'VehicleRoadtaxeController@index_by_vehicle_ajax')->name('vehicle_roadtaxe.index_by_vehicle_ajax');
    Route::get('vehicle_roadtaxe/create_by_vehicle/{id}', 'VehicleRoadtaxeController@create_by_vehicle')->name('vehicle_roadtaxe.create_by_vehicle');

});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_subcategorie/export-remote/{type}', 'VehicleSubcategorieController@index')->name('vehicle_subcategorie.export_pdf');
    Route::post('vehicle_subcategorie/indexAjax', 'VehicleSubcategorieController@indexAjax')->name('vehicle_subcategorie.indexAjax');
    Route::get('vehicle_subcategorie/indexAjax', 'VehicleSubcategorieController@indexAjax')->name('vehicle_subcategorie.indexAjax');
    Route::resource('vehicle_subcategorie','VehicleSubcategorieController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_summon/export-remote/{type}', 'VehicleSummonController@index')->name('vehicle_summon.export_pdf');
    Route::post('vehicle_summon/indexAjax', 'VehicleSummonController@indexAjax')->name('vehicle_summon.indexAjax');
    Route::get('vehicle_summon/indexAjax', 'VehicleSummonController@indexAjax')->name('vehicle_summon.indexAjax');

    Route::get('vehicle_summon/index_by_vehicle/{id}', 'VehicleSummonController@index_by_vehicle')->name('vehicle_summon.index_by_vehicle');
    Route::post('vehicle_summon/index_by_vehicle_ajax/{id}', 'VehicleSummonController@index_by_vehicle_ajax')->name('vehicle_summon.index_by_vehicle_ajax');
    Route::get('vehicle_summon/create_by_vehicle/{id}', 'VehicleSummonController@create_by_vehicle')->name('vehicle_summon.create_by_vehicle');

    Route::resource('vehicle_summon','VehicleSummonController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_toll/export-remote/{type}', 'VehicleTollController@index')->name('vehicle_toll.export_pdf');
    Route::post('vehicle_toll/indexAjax', 'VehicleTollController@indexAjax')->name('vehicle_toll.indexAjax');
    Route::get('vehicle_toll/indexAjax', 'VehicleTollController@indexAjax')->name('vehicle_toll.indexAjax');
    Route::resource('vehicle_toll','VehicleTollController');

    Route::get('vehicle_toll/index_by_vehicle/{id}', 'VehicleTollController@index_by_vehicle')->name('vehicle_toll.index_by_vehicle');
    Route::post('vehicle_toll/index_by_vehicle_ajax/{id}', 'VehicleTollController@index_by_vehicle_ajax')->name('vehicle_toll.index_by_vehicle_ajax');
    Route::get('vehicle_toll/create_by_vehicle/{id}', 'VehicleTollController@create_by_vehicle')->name('vehicle_toll.create_by_vehicle');

});
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_type/export-remote/{type}', 'VehicleTypeController@index')->name('vehicle_type.export_pdf');
    Route::post('vehicle_type/indexAjax', 'VehicleTypeController@indexAjax')->name('vehicle_type.indexAjax');
    Route::get('vehicle_type/indexAjax', 'VehicleTypeController@indexAjax')->name('vehicle_type.indexAjax');
    Route::resource('vehicle_type','VehicleTypeController');
});
Route::group(['middleware' => ['auth']], function () {
	Route::post('zone/export-remote/{type}', 'ZoneController@index')->name('zone.export_pdf');
    Route::post('zone/indexAjax', 'ZoneController@indexAjax')->name('zone.indexAjax');
    Route::get('zone/indexAjax', 'ZoneController@indexAjax')->name('zone.indexAjax');
    Route::resource('zone','ZoneController');
});