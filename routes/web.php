<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/login', 'App\Http\Controllers\MainController@index');
Route::get('/logout', 'App\Http\Controllers\MainController@logout');
Route::post('/main/checklogin', 'App\Http\Controllers\MainController@checklogin');
Route::get('main/successlogin', 'App\Http\Controllers\MainController@successlogin');
Route::get('dashboard', 'App\Http\Controllers\AdminController@dashboard');

Route::get('/company/manage', 'App\Http\Controllers\CompanyController@manage');
Route::post('/company/addcompanyajax', 'App\Http\Controllers\CompanyController@addcompanyajax');
Route::post('/company/addcompanyprocess', 'App\Http\Controllers\CompanyController@addcompanyprocess');
Route::post('/company/viewcompanyajax', 'App\Http\Controllers\CompanyController@viewcompanyajax');
Route::post('/company/updatecompanyajax', 'App\Http\Controllers\CompanyController@updatecompanyajax');
Route::post('/company/updatecompanyprocess', 'App\Http\Controllers\CompanyController@updatecompanyprocess');
Route::post('/company/deletecompanyprocess', 'App\Http\Controllers\CompanyController@deletecompanyprocess');

Route::get('/employee/manage', 'App\Http\Controllers\EmployeeController@manage');
Route::post('/employee/addemployeeajax', 'App\Http\Controllers\EmployeeController@addemployeeajax');
Route::post('/employee/addemployeeprocess', 'App\Http\Controllers\EmployeeController@addemployeeprocess');
Route::post('/employee/viewemployeeajax', 'App\Http\Controllers\EmployeeController@viewemployeeajax');
Route::post('/employee/updateemployeeajax', 'App\Http\Controllers\EmployeeController@updateemployeeajax');
Route::post('/employee/updateemployeeprocess', 'App\Http\Controllers\EmployeeController@updateemployeeprocess');
Route::post('/employee/deleteemployeeprocess', 'App\Http\Controllers\EmployeeController@deleteemployeeprocess');