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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'OrderController@index')->name('orders.index')->middleware('auth');
//orders
Route::get('/admin/orders', 'OrderController@index')->name('orders.index')->middleware('auth');
Route::get('/order','OrderController@make')->name('orders.make');
    Route::post('/orderconfirm','OrderController@confirm')->name('orders.confirm');
Route::get('/admin/orders/{id}', 'OrderController@order')->name('orders.order')->middleware('auth');
    Route::post('/admin/ordersdone','OrderController@done')->name('orders.done');
//categories
Route::get('/admin/categories', 'CategorieController@index')->name('Categories.index')->middleware('auth');
Route::get('/admin/categories/create', 'CategorieController@create')->name('Categories.create')->middleware('auth');
    Route::post('/admin/categories/insert', 'CategorieController@insert')->name('Categories.insert')->middleware('auth');
Route::get('/admin/categories/update/{id}', 'CategorieController@update')->name('Categories.update')->middleware('auth');
    Route::post('/admin/categories/update', 'CategorieController@modify')->name('Categories.modify')->middleware('auth');
    Route::post('/admin/categories/delete', 'CategorieController@delete')->name('Categories.delete')->middleware('auth');
//food
Route::get('/admin/foods', 'FoodController@index')->name('Foods.index')->middleware('auth');
Route::get('/admin/foods/create', 'FoodController@create')->name('Foods.create')->middleware('auth');
    Route::post('/admin/foods/insert', 'FoodController@insert')->name('Foods.insert')->middleware('auth');
Route::get('/admin/foods/update/{id}', 'FoodController@update')->name('Foods.update')->middleware('auth');
    Route::post('/admin/foods/update', 'FoodController@modify')->name('Foods.modify')->middleware('auth');
    Route::post('/admin/foods/delete', 'FoodController@delete')->name('Foods.delete')->middleware('auth');
//addons
Route::get('/admin/addons', 'AddonController@index')->name('Addons.index')->middleware('auth');
Route::get('/admin/addons/create', 'AddonController@create')->name('Addons.create')->middleware('auth');
    Route::post('/admin/addons/insert', 'AddonController@insert')->name('Addons.insert')->middleware('auth');
Route::get('/admin/addons/update/{id}', 'AddonController@update')->name('Addons.update')->middleware('auth');
    Route::post('/admin/addons/update', 'AddonController@modify')->name('Addons.modify')->middleware('auth');
    Route::post('/admin/addons/delete', 'AddonController@delete')->name('Addons.delete')->middleware('auth');