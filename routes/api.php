<?php

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/health', function(Request $request){

    $response = response()->json(['data' => 'running'], 200);
	$response->header('Content-Type', 'application/json');

	return $response;
});

Route::namespace('Api')->group(function(){

	Route::prefix('products')->group(function(){
		Route::get('/', 'ProductController@index');
		Route::get('/{id}', 'ProductController@show');
		Route::post('/', 'ProductController@save');
		Route::put('/', 'ProductController@update');
		Route::patch('/', 'ProductController@update');
		Route::delete('/{id}', 'ProductController@delete');
	});

	Route::resource('/users', 'UserController');

});
