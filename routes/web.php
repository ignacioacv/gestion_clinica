<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ApoimentsController;
use App\Http\Controllers\MedicalConsultationController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PDFController;
use App\Models\Patients;
use Illuminate\Support\Facades\Route;


//index
Route::get('/', function () {return view('template_public');})->name('template_public');
Route::get('/home', function () {return view('home');});
Route::get('/Login', function () {return view('login');});

Route::get('/iniciar_sesion',[LoginController::class, 'iniciarSesion'])->name('iniciar_sesion');

Route::get('/cerrar_sesion',[LoginController::class, 'cerrarSesion'])->name('cerrar_sesion');

//Apoiments
Route::get('/apoiments', [ApoimentsController::class, 'index'])->name('apoiments_list');
Route::put('/edit_apoiment/{id}', [ApoimentsController::class, 'update'])->name('update_apoiment');
Route::get('/add_apoiment_form', [ApoimentsController::class, 'getAllPersons']);
Route::post('/saveApoiment', [ApoimentsController::class, 'store'])->name('save_apoiment');
Route::delete('/delete_apoiment/{id}', [DoctorController::class, 'destroy'])->name('delete_apoiment');


//MedicalConsultations
Route::get('/medical_consultations', [MedicalConsultationController::class, 'index'])->name('medical_consultation_list');
Route::post('/add_medical_form/{id}', [MedicalConsultationController::class, 'getApoimentDisease'])->name('form_medical');
Route::post('/save_medical_consultation', [MedicalConsultationController::class, 'store'])->name('save_medical');
Route::put('/edit_medical_consultation/{id}', [MedicalConsultationController::class , 'update'])->name('update_medical');

//Calendar
Route::get('/calendar_view', [CalendarController::class, 'index']);

//Doctors
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors_list');
Route::put('/desactivar_doctor/{id}', [DoctorController::class, 'cambiar_estado'])->name('desactivar_doctor');
Route::put('/edit_doctor/{id}', [DoctorController::class, 'update'])->name('update_doctor');
Route::get('/add_doctor_form', [DoctorController::class, 'getAllPersons']);
Route::post('/saveDoctor', [DoctorController::class, 'store'])->name('save_doctor');
Route::delete('/delete_doctor/{id}', [DoctorController::class, 'destroy'])->name('delete_doctor');

//Doctores inactivos
Route::get('/doctors_inactivos', [DoctorController::class, 'index2'])->name('doctors_list2');
Route::put('/activar_doctor/{id}', [DoctorController::class, 'cambiar_state'])->name('activar_doctor');

//Patient
Route::get('/patient', [PatientController::class, 'index'])->name('patient_list');
Route::get('/add_patient', [PatientController::class, 'create']);
Route::put('/edit_patient/{id}', [PatientController::class, 'update'])->name('update_patient');
Route::post('/savePatient', [PatientController::class, 'store'])->name('save_patient');
Route::delete('/delete_patient/{id}', [PatientController::class, 'destroy'])->name('delete_patient');

//Nurse
Route::get('/nurse', [NurseController::class, 'index'])->name('nurse_list');
Route::get('/add_nurses', [NurseController::class, 'create']);
Route::put('/edit_nurse/{id}', [NurseController::class, 'update'])->name('update_nurse');
Route::post('/saveNurse', [NurseController::class, 'store'])->name('save_nurse');
Route::delete('/delete_nurse/{id}', [NurseController::class, 'destroy'])->name('delete_nurse');

//Reports
Route::get('/r_doctor', [PDFController::class, 'reportDoctor']);
Route::get('/r_patient', [PDFController::class, 'reportPatient']);
Route::get('/r_nurse', [PDFController::class, 'reportNurse']);