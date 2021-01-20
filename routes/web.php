<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'students'], function(){

	Route::get('/', 'StudentController@index') -> name('students.index');

	Route::post('/store', 'StudentController@store') -> name('students.store');

	Route::get('/create', 'StudentController@create') -> name('students.create');

	Route::get('/show/{id}', 'StudentController@show') -> name('students.show');
	
	Route::get('/edit/{id}', 'StudentController@edit') -> name('students.edit');

	Route::put('/update/{id}', 'StudentController@update') -> name('students.update');

	Route::delete('/delete/{id}', 'StudentController@delete') -> name('students.delete');

});




Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'staff'], function(){

	Route::get('/', 'StaffController@index') -> name('staff.index');

	Route::post('/store', 'StaffController@store') -> name('staff.store');

	Route::get('/create', 'StaffController@create') -> name('staff.create');

	Route::get('/show/{id}', 'StaffController@show') -> name('staff.show');
	
	Route::get('/edit/{id}', 'StaffController@edit') -> name('staff.edit');

	Route::put('/update/{id}', 'StaffController@update') -> name('staff.update');

	Route::delete('/delete/{id}', 'StaffController@delete') -> name('staff.delete');

});



Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'teachers'], function(){

	Route::get('/', 'TeacherController@index') -> name('teachers.index');

	Route::post('/store', 'TeacherController@store') -> name('teachers.store');

	Route::get('/create', 'TeacherController@create') -> name('teachers.create');

	Route::get('/show/{id}', 'TeacherController@show') -> name('teachers.show');
	
	Route::get('/edit/{id}', 'TeacherController@edit') -> name('teachers.edit');

	Route::put('/update/{id}', 'TeacherController@update') -> name('teachers.update');

	Route::delete('/delete/{id}', 'TeacherController@delete') -> name('teachers.delete');

});