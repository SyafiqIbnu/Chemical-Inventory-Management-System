<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Helpers\SendMailMessage;
use PHPJasper\PHPJasper;

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

$routePath = __DIR__;
$files = scandir("$routePath/ext.routes");
foreach ($files as $r) {
    if ($r == "." || $r == "..") {
        continue;
    }
    $t = "$routePath/ext.routes/$r";
    if (substr($t, -4, 4) == ".php") {
        //print "<br>$t";
        require_once($t);
    }
}

Route::post('/login', 'Auth\LoginController@tfaLogin')->name('login');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('report','ReportController@ShowLaboratoryReport');
    Route::get('reportchemical','ReportController@ShowChemicalReport');


});


