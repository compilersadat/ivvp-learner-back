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
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::resource('ebook','EBookController');
    Route::get('ebook/delete/{id}','EBookController@delete')->name('ebook.delete');

    Route::resource('chapter','ChapterController');
    Route::get('chapter/delete/{id}','ChapterController@delete')->name('chapter.delete');

    Route::get('chapter-data/{id}', 'ChapterController@chapterList')->name('chapter-data');


    Route::resource('data','DataController');
    Route::get('data/delete/{id}','DataController@delete')->name('data.delete');

    Route::resource('student-purchase','StudentPurchaseController');
    Route::get('student-purchase/delete/{id}','StudentPurchaseController@delete')->name('student-purchase.delete');

    Route::resource('content','ContentController');
});



Route::get('ckeditor', 'CkeditorController@index');
Route::get('edit/ckeditor', 'CkeditorController@editIndex');
Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
