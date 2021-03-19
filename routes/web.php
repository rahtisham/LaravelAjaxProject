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


// Insert Delete Update Route
Route::get('Student-submit-From' , 'StudentsController@index')->name('Student-submit-From');
Route::post('Student-InsertData' , 'StudentsController@Add_student')->name('Student.InsertData');
Route::get('Student-view' , 'StudentsController@Student_view')->name('Student-view');
Route::get('edit/{id}' , 'StudentsController@Update_Student_Without_Ajax')->name('student.edit');
Route::any('Student-edit/{id}' , 'StudentsController@student_update_emplementation')->name('student.emplent');
Route::any('destroy/{id}' , 'StudentsController@student_destroy')->name('student.destroy');

// End 


// Update With Ajax

Route::get('UpdateStudentDataAjaxGetID/{id}' , 'StudentsController@GetLintId')->name('student.getbyid');
Route::put('studentAjax' , 'StudentsController@Student_Update_With_Ajax')->name('student.update');

// End



