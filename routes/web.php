<?php

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

// Route::get('test', function () {
//     $user = new  App\Datos;
//     $user->x ="7";
//     $user->y ="35";
//     $user->save();
// });

Route::get('/',['as'=>'/','uses'=>'SensorController@index']);
Route::get('datos',['as'=>'datos','uses'=>'SensorController@datos']);
Route::get('sensor/{temperatura}/{humedad}',['as'=>'sensor','uses'=>'SensorController@sensor']);
Route::get('login', ['as'=> 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
