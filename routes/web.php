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

Route::get('/', 'HomeContentController@indexAction');
Route::get('/get-description', 'GoodsController@showAction');	// получить описание и положить его в модалку
Route::post('/add-to-cart', 'CartController@addAction');	// добавить в коризну
Route::post('/show-cart', 'CartController@showAction');		// показать коризну
Route::post('/send-order', 'CartController@sendAction');	// отправить заказ
Route::post('/delete-cart', 'CartController@deleteAction'); // очистка корзины

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
