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


Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/editpizza', function () {
    return view('editpizza');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/View', function () {

    return view('View');
});
Route::get('/addpizza', function () {

    return view('addpizza');
});
Route::get('/showUsers', function () {

    return view('showUsers');
});
Route::post('/pizza','AddPizza@addPizza');

Route::post('/pizza/{id}','EditDeletePizza@edit');

Route::get('/deletepizza/{pizza}','EditDeletePizza@detail');
Route::get('/editpizza/{id}','EditDeletePizza@edit2');

Route::get('/deletepizza/pizza/{id}','EditDeletePizza@delete');

Route::get('/delete','EditDeletePizza@delete');
Route::get('/showUsers', 'HomeController@index2');
Route::get('/home','HomeController@view');
Route::get('/cartPizza/{id}','EditDeletePizza@detailcart');
Route::get('/cartPizza/Add/{userid}/{pizza_id}','EditDeletePizza@addCart');
Route::post('cart/{id}','EditDeletePizza@cartOrder');
Route::get('/cartPizzaview','EditDeletePizza@cartView');
Route::post('/updatecart/{id}/{pizzaid}','EditDeletePizza@cartUpdate');
Route::get('/deletecart/{id}','EditDeletePizza@cartDelete');

