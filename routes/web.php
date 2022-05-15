<?php

use App\Http\Controllers\Front\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesPageController;
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

Route::get('/', 'App\Http\Controllers\Front\HomePageController@index' )->name('front.homepage');

Route::get('/login', 'App\Http\Controllers\Admin\AuthPageController@index' )->name('admin.Auth');
Route::get('/facebook', 'App\Http\Controllers\Admin\AuthPageController@redirect' )->name('admin.redirect');
Route::get('/facebookcall', 'App\Http\Controllers\Admin\AuthPageController@callback' )->name('admin.callback');
Route::post('/login', 'App\Http\Controllers\Admin\AuthPageController@login' )->name('admin.login');


Route::get('/signUp', 'App\Http\Controllers\Admin\AuthPageController@signUpView' )->name('front.signUp');
Route::post('/signUp', 'App\Http\Controllers\Admin\AuthPageController@signUp' )->name('admin.signUp');

Route::get('/Courses/{id}', 'App\Http\Controllers\CoursesPageController@index' )->name('frdont.Courases');


Route::middleware('login')->group(function (){
    # code...
    Route::get('/admin', 'App\Http\Controllers\admin\AdminPageController@index')->name('admin');

    Route::get('/Profile', 'App\Http\Controllers\Front\ProfilePageController@index' )->name('front.Profile');
    Route::post('/add','App\Http\Controllers\admin\AdminPageController@Lectures')->name('admin.add');

    Route::post('/instructor', 'App\Http\Controllers\admin\AdminPageController@Instructor')->name('admin.add.instructor');
    Route::post('/instructors', 'App\Http\Controllers\admin\AdminPageController@Lectures')->name('admin.add.lec');
    Route::post('/course', 'App\Http\Controllers\admin\AdminPageController@Courses')->name('admin.course');
    Route::post('/quiz', 'App\Http\Controllers\admin\AdminPageController@quiz')->name('admin.quiz');
    Route::post('/squiz', 'App\Http\Controllers\admin\AdminPageController@submit')->name('admin.squiz');
    Route::get('/logout', 'App\Http\Controllers\Admin\AuthPageController@logout' )->name('admin.logout');
    Route::get('/gen/{id}', 'App\Http\Controllers\generateController@generate' )->name('admin.gen');

    Route::get('/enroll/{id}', 'App\Http\Controllers\Front\HomePageController@enroll')->name('enroll');
    Route::get('/Courses/{id}/{lid}', 'App\Http\Controllers\Front\HomePageController@Lectures')->name('front.lecture');
    

});

