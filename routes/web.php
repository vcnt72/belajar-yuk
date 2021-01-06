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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/course/create','CourseController@create_view')->middleware('auth.check.admin')->name('create_course_view');
Route::post('/course','CourseController@create')->middleware('auth.check.admin')->name('create_course');

Route::get('/','CourseController@get')->name('get_course');
Route::get('/course/update/{id}','CourseController@update_view')->middleware('auth.check.admin')->name('update_course_view');
Route::put('/course/{id}','CourseController@update')->middleware('auth.check.admin')->name('update_course');
Route::delete('course/{id}','CourseController@delete')->middleware('auth.check.admin')->name('delete_course');
Route::get('/course/{id}','CourseController@get_one')->name('get_one_course');

Route::get('/course/{id}/video/create','VideoController@add_view')->middleware('auth.check.admin')->name('create_video_view');
Route::post('/course/{course_id}/video','VideoController@addVideo')->middleware('auth.check.admin')->name('create_video');
Route::get('/course/{id}/video/{order}', 'VideoController@get_details')->name('get_video');

Route::post('/course/{id}/cart','CartController@add')->middleware('auth')->name('add_cart');
Route::delete('/course/{id}/cart','CartController@delete')->name('delete_cart');
Route::get('/cart','CartController@get')->name('get_cart');

Route::post('/order','TransactionController@create')->name('create_order');

Route::get('/order','TransactionController@get')->middleware('auth')->name('get_order');
Route::get('/order/{id}','TransactionController@get_details')->middleware('auth')->name('get_order_details');

Route::get('/course-category','CourseCategoryController@get')->name('get_course_category');
Route::post('/course-category','CourseCategoryController@create')->name('create_course_category');
Route::put('/course-category/{id}','CourseCategoryController@update')->name('update_course_category');
Route::get('/course-category/create','CourseCategoryController@create_view')->name('view_create_course_category');
Route::get('/course-category/update/{id}','CourseCategoryController@update_view')->name('view_update_course_category');
Route::delete('/course-category/{id}','CourseCategoryController@delete')->name('delete_course_category');