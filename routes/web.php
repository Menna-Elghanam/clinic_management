<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicalRecordsController;

Route::resource('clinics/{clinic}/doctors', DoctorController::class);
Route::resource('clinics', ClinicController::class);
Route::resource('clinics/{clinic}/medical_records', MedicalRecordsController::class);
Route::resource('clinics/{clinic}/patients', PatientController::class);
Route::resource('clinics/{clinic}/appointments', AppointmentController::class);



