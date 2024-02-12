<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ApoimentsController;
use App\Http\Controllers\MedicalConsultationController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;


//index
Route::get('/', function () {return view('template_public');})->name('template_public');
Route::get('/Login', function () {return view('login');});

Route::get('/iniciar_sesion',[LoginController::class, 'iniciarSesion'])->name('iniciar_sesion');

Route::get('/cerrar_sesion',[LoginController::class, 'cerrarSesion'])->name('cerrar_sesion');

//Apoiments
Route::get('/apoiments', [ApoimentsController::class, 'index'])->name('apoiments_list');
Route::put('/edit_apoiment/{id}', [ApoimentsController::class, 'update'])->name('update_apoiment');
Route::get('/add_apoiment_form', [ApoimentsController::class, 'getAllPersons']);
Route::post('/saveApoiment', [ApoimentsController::class, 'store'])->name('save_apoiment');

//MedicalConsultations
Route::get('/medical_consultations', [MedicalConsultationController::class, 'index'])->name('medical_consultation_list');
Route::post('/add_medical_form/{id}', [MedicalConsultationController::class, 'getApoimentDisease'])->name('form_medical');
Route::post('/save_medical_consultation', [MedicalConsultationController::class, 'store'])->name('save_medical');
Route::put('/edit_medical_consultation/{id}', [MedicalConsultationController::class , 'update'])->name('update_medical');

//Calendar
Route::get('/calendar_view', [CalendarController::class, 'index']);
