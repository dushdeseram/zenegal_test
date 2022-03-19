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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'App\Http\Controllers\MainController@index');
Route::get('/logout', 'App\Http\Controllers\MainController@logout');
Route::post('/main/checklogin', 'App\Http\Controllers\MainController@checklogin');
Route::get('main/successlogin', 'App\Http\Controllers\MainController@successlogin');
Route::get('dashboard', 'App\Http\Controllers\AdminController@dashboard');

Route::get('/company/manage', 'App\Http\Controllers\CompanyController@manage');
Route::post('/company/addcompanyajax', 'App\Http\Controllers\CompanyController@addcompanyajax');
Route::post('/company/addcompanyprocess', 'App\Http\Controllers\CompanyController@addcompanyprocess');
Route::post('/company/addlogoprocess', 'App\Http\Controllers\CompanyController@addlogoprocess');
Route::post('/company/viewcompanyajax', 'App\Http\Controllers\CompanyController@viewcompanyajax');
Route::post('/company/updatecompanyajax', 'App\Http\Controllers\CompanyController@updatecompanyajax');
Route::post('/company/updatecompanyprocess', 'App\Http\Controllers\CompanyController@updatecompanyprocess');
Route::post('/company/deletecompanyprocess', 'App\Http\Controllers\CompanyController@deletecompanyprocess');
