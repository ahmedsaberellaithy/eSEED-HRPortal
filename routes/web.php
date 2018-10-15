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

Route::resource('employee','EmployeeController');

Route::resource('attendance','AttendanceController')->except('edit','index');

Route::get('/request','ReportsController@requestPage')->name('reports.request');
Route::post('/report','ReportsController@generateReport')->name('reports.generate');
Route::get('/theEmployee','ReportsController@requestForEmployeeOfTheMonth')->name('reports.employeeOfTheMonth');
Route::post('/theEmployee','ReportsController@employeeOfTheMonth')->name('reports.employeeOfTheMonth');
