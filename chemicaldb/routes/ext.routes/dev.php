<?php
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