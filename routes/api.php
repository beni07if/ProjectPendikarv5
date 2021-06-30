<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['prefix' => 'v1'], function () {
//     Route::resource('user', 'UserController', [
//         'except' => ['create', 'edit']
//     ]);

//     Route::resource('meeting', 'TestingMeetingController', [
//         'except' => ['create', 'edit']
//     ]);

//     Route::resource('meeting/registration', 'RegistrationController', [
//         'only' => ['store', 'destroy']
//     ]);

//     Route::post('/user/register', [
//         'user' => 'AuthController@store'
//     ]);

//     Route::post('/user/sign', [
//         'user' => 'AuthController@sign'
//     ]);
// });


Route::group(['prefix' => 'v1'], function () {
    // Route::get('/ApiNP', 'ApiController@testApiNP')->name('testApiNP');
    Route::get('/ApiDpnaPendikar', 'ApiController@ApiDpnaPendikar')->name('ApiDpnaPendikar');
    Route::get('/ApiDpnaPendikar/Prodi/{prodi}', 'ApiController@ApiDpnaPendikarProdi')->name('ApiDpnaPendikarProdi');
});
