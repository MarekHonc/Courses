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

Auth::routes();

Route::get('/', 'PublicController@allCourses');

Route::get('/home', 'CourseController@myCourses');
Route::get('/allmy', 'CourseController@allMyCourses');

Route::get('/new', 'CourseController@create');
Route::post('/new','CourseController@storeNew');

Route::get('/edit/{course}', 'CourseController@edit');
Route::post('/edit','CourseController@storeEdit');

Route::post('/delete/{course}','CourseController@delete');

Route::post('joincourse/{course}', 'CourseController@joinCourse');
Route::post('leavecourse/{course}', 'CourseController@leaveCourse');