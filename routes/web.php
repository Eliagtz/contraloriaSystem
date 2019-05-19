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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Period Resource
Route::resource('period', 'PeriodController');

//Expense Resource
Route::resource('expense', 'ExpenseController', ['except' => ['create']]);
Route::get('expense/create/{period}', 'ExpenseController@create')->name('expense.create');
Route::get('period/expense/{period}', 'ExpenseController@index')->name('period.expense.index');

//Income Resource
Route::resource('income', 'IncomeController', ['except' => ['create']]);
Route::get('income/create/{period}', 'IncomeController@create')->name('income.create');
Route::get('period/income/{period}', 'IncomeController@index')->name('period.income.index');
