<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ImportCsvFileController;
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
Route::get('Student-submit-From' , [StudentsController::class , 'index'])->name('Student-submit-From');
Route::post('Student-InsertData' , [StudentsController::class ,'Add_student'])->name('Student.InsertData');
Route::get('Student-view' , [StudentsController::class ,'Student_view'])->name('Student-view');
Route::get('edit/{id}' , [StudentsController::class , 'Update_Student_Without_Ajax'])->name('student.edit');
Route::any('Student-edit/{id}' , [StudentsController::class ,'student_update_emplementation'])->name('student.emplent');
Route::any('destroy/{id}' , [StudentsController::class , 'student_destroy'])->name('student.destroy');

Route::get('Import-file' , function(){
    return view('importCsv');
})->name('Import-file');
// End 


// Update With Ajax
Route::get('UpdateStudentDataAjaxGetID/{id}' , 'StudentsController@GetLintId')->name('student.getbyid');
Route::put('studentAjax' , 'StudentsController@Student_Update_With_Ajax')->name('student.update');
// End


// Use for import file
Route::post('import-file-implementation' , [ImportCsvFileController::class , 'importCsvfile'])->name('import-file-implementation');
// End


Route::group(['middleware' => ['auth']] , function(){

    Route::get('admin/edit-profile' , function() {
       return view('edit-profile');
    })->name('edit-profile');

});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
