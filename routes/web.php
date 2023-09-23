<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/company', [CompanyController::class,"index"])->name("company.index")->middleware("auth");

Route::get('/employee', [EmployeeController::class,"index"])->name("employee.index")->middleware("auth");

Route::get('/company/add', function () {
    return view('company/addcompany');
})->name("company.add")->middleware("auth");

Route::get('/employee/add', [EmployeeController::class,"add"])->name("employee.add")->middleware("auth");

Route::get('/company/edit/{id}',[CompanyController::class,"edit"])->middleware("auth");

Route::get('/employee/edit/{id}',[EmployeeController::class,"edit"])->name("employee.edit")->middleware("auth");

Route::post('/login',[UserController::class,"create"]);

Route::post('/company/add',[CompanyController::class,"add"])->middleware("auth");

Route::post('/employee/add',[EmployeeController::class,"create"])->name("employee.create")->middleware("auth");


Route::put('/company/update/{id}',[CompanyController::class,"updateone"])->name("company.update")->middleware("auth");

Route::put('/employee/update/{id}',[EmployeeController::class,"update"])->name("employee.update")->middleware("auth");

Route::delete('/company/delete/{id}',[CompanyController::class,"destroy"])->name("company.delete")->middleware("auth");

Route::delete('/employee/delete/{id}',[EmployeeController::class,"destroy"])->name("employee.delete")->middleware("auth");



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
