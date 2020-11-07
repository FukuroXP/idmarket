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



Route::get('/', 'HomeController@index')->name('user_dashboard');

Route::get('/allfree', 'HomeController@allFree')->name('allfree');
Route::get('/allpay', 'HomeController@allPay')->name('allpay');
Route::post('/search', 'HomeController@search')->name('search');

Route::get('product_detail/{id}','ProductController@detail');
Route::get('trans_detail/{id}','TransactionController@index');

Route::post('/transgo', 'TransactionController@store');
Route::get('/user_transactions', 'TransactionController@showUser')->name('user_transactions');
Route::get('/user_items', 'TransactionController@showUserItems')->name('user_items');

Route::get('/payment_upload/{id}', 'PaymentController@index')->name('payment_upload');
Route::post('/paygo', 'PaymentController@store');
Route::delete('/proof/{id}', 'PaymentController@destroy')->name('proof.destroy');

Route::get('/product_download/{file}','TransactionController@download')->name('product_download');
Route::get('/transaction_detail/{id}','TransactionController@trDetail')->name('transaction_detail');

Route::get('/my_custome', 'CustomeController@myCustome')->name('my_custome');
Route::get('/c_layout', 'CustomeController@index')->name('c_layout');

Route::post('/attgo', 'AttributeController@store');
Route::get('/custome_name/{id}','CustomeController@name');
Route::post('/cusgo', 'CustomeController@store');

Route::get('/custome/{id}/att/{attid}', 'CustomeController@custome')->name('custome');
Route::post('/bgfgo/{id}', 'AttributeController@bgf')->name('bgfgo.edit');
Route::post('/bgbgo/{id}', 'AttributeController@bgb')->name('bgbgo.edit');
Route::post('/ppgo/{id}', 'AttributeController@pp')->name('ppgo.edit');
Route::post('/text/{id}', 'AttributeController@text')->name('text.edit');



Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/', 'AdminController@index')->name('admin_dashboard');

    Route::get('/product_create', 'ProductController@index')->name('product_create');
    Route::post('/prodgo', 'ProductController@store');
    Route::get('/product_show', 'ProductController@show')->name('product_show');
    Route::get('/product_update/{id}','ProductController@edit');
    Route::post('/produp/{id}','ProductController@update')->name('produp.edit');
    Route::delete('/product/{id}', 'ProductController@destroy')->name('product.destroy');

    Route::get('/category_create', 'CategoryController@index')->name('category_create');
    Route::post('/catego', 'CategoryController@store');
    Route::get('/category_show', 'CategoryController@show')->name('category_show');
    Route::get('/category_update/{id}','CategoryController@edit');
    Route::post('/cateup/{id}','CategoryController@update')->name('cateup.edit');
    Route::delete('/category/{id}', 'CategoryController@destroy')->name('category.destroy');

    Route::get('/role_create', 'RoleController@index')->name('role_create');
    Route::post('/rolego', 'RoleController@store');
    Route::get('/role_show', 'RoleController@show')->name('role_show');
    Route::get('/role_update/{id}','RoleController@edit');
    Route::post('/roleup/{id}','RoleController@update')->name('roleup.edit');
    Route::delete('/role/{id}', 'RoleController@destroy')->name('role.destroy');

    Route::get('/admin_show', 'UserController@showAdmin')->name('admin_show');
    Route::get('/user_show', 'UserController@showUser')->name('user_show');
    Route::get('/user_update/{id}','UserController@edit');
    Route::post('/userup/{id}','UserController@update')->name('userup.edit');

    Route::get('/transactions_show', 'TransactionController@show')->name('transactions_show');

    Route::get('/payment_show/{id}', 'PaymentController@show')->name('payment_show');
    Route::post('/payment_edit/{id}','PaymentController@update')->name('payment.edit');

});



 
Auth::routes();

