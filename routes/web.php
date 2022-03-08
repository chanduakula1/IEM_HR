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

Route::get('/', function (){
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\EmployeeController::class , 'employeeform'])->name('home');
Route::post('/employeeformsubmit', [App\Http\Controllers\EmployeeController::class , 'employeeformsubmit'])->name('employeeformsubmit');
Route::match(['get', 'post'],'/list', [App\Http\Controllers\EmployeeController::class , 'employeelist'])->name('list');
Route::match(['get', 'post'],'/edit/{value?}', [App\Http\Controllers\EmployeeController::class , 'employeelistedit'])->name('edit');
Route::match(['get', 'post'],'/delete/{value?}', [App\Http\Controllers\EmployeeController::class , 'employeelistdelete'])->name('delete');
Route::match(['get', 'post'],'/employee-update/{value?}', [App\Http\Controllers\EmployeeController::class , 'employeeupdate'])->name('employee-update');
