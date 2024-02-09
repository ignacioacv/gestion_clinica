<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Patients;
use App\Models\Doctors;
use App\Models\NursingStaff;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function iniciarSesion(Request $request){
        $correo = $request->post('email');
        $password = $request->post('password');

        //tipo de usuario
        $admin = Admin::where('email', '=', $correo)->where('password', '=', $password)->get();
        $doctor = Doctors::where('email', '=', $correo)->where('password', '=', $password)->get();
        $nurse = NursingStaff::where('email', '=', $correo)->where('password', '=', $password)->get();
        $patient = Patients::where('email', '=', $correo)->where('password', '=', $password)->get();



        if (count($admin) > 0) {
            foreach($admin as $admin){
                //crear sesiones (para mantener su informacion mientras este activo )
                session(['id_admin' => $admin->id]); 
                session(['admin' => $admin->nombre]); 
                //mandar para la vista template_admin
                return view('template_admin');
            }
        } elseif (count($doctor) > 0) {
            foreach($doctor as $doctor){
                //crear sesiones (para mantener su informacion mientras este activo )
                session(['doctor' => $doctor->name]);
                //mandar para la vista template_admin
                return view('template_doctor');
            }
        } elseif (count($nurse) > 0) {
            foreach($nurse as $nurse){
                //crear sesiones (para mantener su informacion mientras este activo )
                session(['nurse' => $nurse->name]);
                //mandar para la vista template_admin
                return view('template_nurse');
            }
        } elseif (count($patient) > 0) {
            foreach($patient as $patient){
                //crear sesiones (para mantener su informacion mientras este activo )
                session(['patient' => $patient->name]);
                //mandar para la vista template_admin
                return redirect()->route('template_public');
            }
            
            
        }

        return "Credenciales inválidas";
    }

    public function cerrarSesion()
    {
        // Olvidar todas las sesiones
        session()->forget(['id_admin', 'admin', 'patient']);
        return redirect()->route('template_public');
    }
}