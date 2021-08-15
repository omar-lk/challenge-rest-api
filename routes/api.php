<?php

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


Route::get('linkedlist','LinkedController@index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('group')->group(function(){
    Route::get('/groups','GroupController@getGroups');
    Route::post('/join','GroupController@joinGroup');
});
Route::prefix('post')->middleware(['ismember'])->group(function(){
    Route::post('/create','PostController@create');
    Route::post('/update','PostController@update');
    Route::post('/delete','PostController@delete');
});
Route::get('/post/{id}','PostController@index');
Route::get('/posts/{group_id}','PostController@getPostByGroup');
