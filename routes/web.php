<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


//index
Route::get('/', function () {return view('template_public');})->name('template_public');
Route::get('/Login', function () {return view('login');});

Route::get('/iniciar_sesion',[LoginController::class, 'iniciarSesion'])->name('iniciar_sesion');

Route::get('/cerrar_sesion',[LoginController::class, 'cerrarSesion'])->name('cerrar_sesion');