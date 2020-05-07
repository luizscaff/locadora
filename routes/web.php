<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', 'HomeController@index');
Route::get('/', 'HomeController@lista');
Route::get('/addVeiculo', 'HomeController@addVeiculo');
Route::post('/addVeiculo', 'HomeController@addVeiculoDo');
Route::get('/addAluguel', 'HomeController@addAluguel');
Route::post('/addAluguel', 'HomeController@addAluguelDo');
Route::get('/addCliente', 'HomeController@addCliente');
Route::post('/addCliente', 'HomeController@addClienteDo');
Route::get('/retornarVeiculo', 'HomeController@retornarVeiculo');
Route::get('/retornarVeiculo/{id}/{carro_id}', 'HomeController@retornarVeiculoDo');
Route::get('/desativarCliente', 'HomeController@desativarCliente');
Route::get('/desativarClienteDo/{id}', 'HomeController@desativarClienteDo');
Route::get('/concederAcesso', 'HomeController@concederAcesso');
Route::post('/concederAcesso', 'HomeController@concederAcessoDo');
/*
Route::get('/home', 'HomeController@lista');
Route::get('/finance', 'FinanceController@index')->middleware('role:finance');
*/
Auth::routes();

Route::get('/home', 'HomeController@lista')->name('home');
//Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'], function () {
	Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);
	Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'HomeController@adminSuperadmin']);
	Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
});
