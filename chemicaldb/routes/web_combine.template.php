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


