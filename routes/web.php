<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::get('/manager-image', function () {
    return view('admin/filemanager/filemanager');
})->name('filemanager.image');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/users', 'UserController');
    Route::resource('tag', 'TagController');
    Route::post('tag/save', 'TagController@save');
    Route::resource('category', 'CategoryController');
    Route::post('category/save', 'CategoryController@save');
    Route::get('post/trashed', 'PostController@trashedPost')->name('post.trashed_post');
    Route::get('post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::delete('post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::resource('post', 'PostController');
});


Route::get('/', 'BlogController@index')->name('app.landing');
Route::get('/tutorial', 'BlogController@tutorials')->name('app.tutorials');
Route::get('/{slug}', 'BlogController@show')->name('app.show');
Route::get('/{any}', function ($any) {

    // any other url, subfolders also
    return view('frontend.notfound.v_notfound');
  
  })->where('any', '.*');
