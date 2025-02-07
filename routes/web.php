<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
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





Route::resource('doctors', DoctorController::class);
Route::resource('clinics', ClinicController::class);
Route::resource('clinics/{clinic}/patients', PatientController::class);
Route::resource('clinics/{clinic}/appointments', AppointmentController::class);





