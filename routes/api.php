<?php

use App\Http\Controllers\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user', 'AuthController@user');
    Route::post('me', 'AuthController@me');
    Route::get('users', 'AuthController@index');
    Route::get('users/{id}/changepassword', 'AuthController@changepassword');
    Route::patch('users/{user}', 'AuthController@updatepassword');
});

Route::resource('books', 'BookController');
