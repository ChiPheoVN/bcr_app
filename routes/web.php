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

Route::get('/login', 'AuthController@viewLogin')->name('login');
Route::post('/login', 'AuthController@doLogin')->name('do-login');
Route::post('/register', 'AuthController@doRegister')->name('do-register');

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('/', function(){
        return redirect()->route('dashboard');
    });
    Route::get('logout','AuthController@doLogout')->name('logout');
    Route::get('csrf-token', function () {
        return response()->json([
            'csrf_token' => csrf_token()
        ]);
    });        
    // view list user with only admin user
    Route::group(['prefix' => '/', 'middleware' => 'admin'], function(){
        Route::resource('user', 'UserController');
        Route::delete('delete-multiple-users','UserController@deleteMultipleUsers')->name('delete-multiple-users');
    });

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('profile','AuthController@viewProfile')->name('view-profile');
    Route::post('profile','AuthController@updateProfile')->name('update-profile');
    Route::resource('customer', 'CustomerController');

    // game
    Route::prefix('bacarat-game')->group(function () {
        Route::get('/', 'BacaratGameController@index')->name('bacarat_game'); 
        Route::get('new-game', 'BacaratGameController@newGame')->name('new-bacarat-game'); 
    });
});
