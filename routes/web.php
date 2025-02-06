<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
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

Route::get('/clinics', [ClinicController::class, 'index'])->name('clinics.index');
Route::get('/clinics/create', [ClinicController::class, 'create'])->name('clinics.create');
Route::post('/clinics', [ClinicController::class, 'store'])->name('clinics.store');
Route::get('/clinics/{id}', [ClinicController::class, 'show'])->name('clinics.show');
Route::get('/clinics/{id}/edit', [ClinicController::class, 'edit'])->name('clinics.edit');
Route::put('/clinics/{id}', [ClinicController::class, 'update'])->name('clinics.update');
Route::delete('/clinics/{id}', [ClinicController::class, 'destroy'])->name('clinics.destroy');



Route::resource('appointments', AppointmentController::class);
Route::resource('doctors', DoctorController::class);


