<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Input;

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

Route::group([ 'prefix' => 'auth'], function (){

    Route::group(['middleware' => ['guest:api']], function () {
        Route::post('login', 'Api\AuthController@login');
        Route::post('signup', 'Api\AuthController@signup');
    });

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('getuser', 'Api\AuthController@getUser');
        Route::get('all/book', 'Api\BookApiController@allBook');
        Route::get('all/chapter', 'Api\ChapterApiController@allChapter');
        Route::get('all/data', 'Api\DataApiController@allData');
    });




});

Route::get('/ajax-get-trends',function(){
    $fact = Input::get('fac');
    $branches=App\Branch::where('wrtf',$fact)->get();
    return response()->json($branches);
})->name('ajax-get-trends');

Route::get('/ajax-get-years',function(){
    $fact = Input::get('fac');
    $years=App\Faculty::where('faculty_id',$fact)->first();
    return response()->json($years);
})->name('ajax-get-years');
