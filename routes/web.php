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

Route::domain('fakebank.test')->group(function(){
    Route::get('/', function () {
        return view('public.index');
    });
});

Route::domain('admin.fakebank.test')->group(function(){
    Auth::routes();

    Route::group(['prefix' => 'bank'], function(){
        Route::get('/', 'BankController@index')->name('bank.index');
        Route::get('/create', 'BankController@create')->name('bank.create');
        Route::post('/', 'BankController@store')->name('bank.store');
        Route::get('/{bank}', 'BankController@show')->name('bank.show');
        Route::get('/edit/{bank}', 'BankController@edit')->name('bank.edit');
        Route::put('/{bank}', 'BankController@update')->name('bank.update');
        Route::delete('/{bank}', 'BankController@destroy')->name('bank.destroy');

        Route::post('/status/{bank}', 'BankController@status')->name('bank.status');
    });

    Route::group(['prefix' => 'transaction'], function(){
        Route::get('/', 'TransactionController@index')->name('transaction.index');
        Route::get('/create', 'TransactionController@create')->name('transaction.create');
        Route::post('/', 'TransactionController@store')->name('transaction.store');
        Route::get('/{transaction}', 'TransactionController@show')->name('transaction.show');
        Route::get('/edit/{transaction}', 'TransactionController@edit')->name('transaction.edit');
        Route::put('/{transaction}', 'TransactionController@update')->name('transaction.update');
        Route::delete('/{transaction}', 'TransactionController@destroy')->name('transaction.destroy');
    });

    Route::get('/home', 'HomeController@index')->name('admin.home');
});
