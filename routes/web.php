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

Route::get('/admin/foods/list', 'FoodController@index')->name('list');

Route::get('/admin/foods/add', 'FoodController@getAdd')->name('food.getAdd');

Route::post('/admin/foods/add', 'FoodController@postAdd')->name('food.postAdd');

Route::get('/admin/foods/edit/{id?}', 'FoodController@getEdit')->name('food.getEdit');

Route::post('/admin/foods/edit/{id?}', 'FoodController@postEdit')->name('food.postEdit');

Route::post('/admin/foods/delete/{id?}', 'FoodController@delete')->name('food.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', function() {

})->middleware('checkLogin');

// Route::get('admin/login', function() {

// })->middleware(CheckLogin::class);
