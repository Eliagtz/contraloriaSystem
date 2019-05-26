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


Route::get('/', 'HomeController@index');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Period Resource
Route::resource('period', 'PeriodController')->middleware('verified');

//Expense Resource
Route::resource('expense', 'ExpenseController', ['except' => ['create']])->middleware('verified');
Route::get('expense/create/{period}', 'ExpenseController@create')->name('expense.create')->middleware('verified');
Route::get('period/expense/{period}', 'ExpenseController@index')->name('period.expense.index')->middleware('verified');

//Income Resource
Route::resource('income', 'IncomeController', ['except' => ['create']])->middleware('verified');
Route::get('income/create/{period}', 'IncomeController@create')->name('income.create')->middleware('verified');
Route::get('period/income/{period}', 'IncomeController@index')->name('period.income.index')->middleware('verified');

Route::resource('user', 'UserController', ['except' => ['create', 'store', 'edit', 'update', 'destroy', 'show']]);