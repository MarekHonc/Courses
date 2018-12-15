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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get("/home", "HomeController@index");

Route::get("/mycourses", "CourseController@myCourses");

Route::get("/new", "CourseController@create");
Route::post("/new","CourseController@storeNew");

Route::get("/detail/{course}", "CourseController@detail");

Route::get("/edit/{course}", "CourseController@edit");
Route::post("/edit/{course}","CourseController@storeNew");

Route::post("/delete/{course}","CourseController@delete");