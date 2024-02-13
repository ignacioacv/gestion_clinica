<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use App\Models\States;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    //Doctor Activo
    public function index()
    {
        $doctors = Doctors::join('states', 'doctors.doctor_state', '=', 'states.id')
        ->select('doctors.id', 'doctors.name', 'doctors.surname', 'doctors.email', 'doctors.phone_number', 'states.state as state', 'doctors.password')
        ->where('doctors.doctor_state', '=', 1)
        ->get(); //[]

        return view('pages.doctors.doctors', compact('doctors'));
    }

    public function cambiar_estado($id){
        $doctors = Doctors::find($id);
        $doctors->doctor_state = 2; //doctor inactivo
        $doctors->update();

        return back();
    }

    //Doctor Inactivo
    public function index2()
    {
        $doctors = Doctors::join('states', 'doctors.doctor_state', '=', 'states.id')
        ->select('doctors.id', 'doctors.name', 'doctors.surname', 'doctors.email', 'doctors.phone_number', 'states.state as state', 'doctors.password')
        ->where('doctors.doctor_state', '=', 2)
        ->get(); //[]

        return view('pages.doctors.doctors_inactivos', compact('doctors'));
    }

    public function cambiar_state($id){
        $doctors = Doctors::find($id);
        $doctors->doctor_state = 1; //doctor activo
        $doctors->update();

        return back();
    }

    //Update Doctor
    public function update(Request $request, $id){
        $doctors = Doctors::find($id);
        $doctors->name = $request->post('nameEdit');
        $doctors->surname= $request->post('surnameEdit');
        $doctors->email = $request->post('emailEdit');
        $doctors->phone_number = $request->post('phone_numberEdit');
        $doctors->password = $request->post('passwordEdit');

        $doctors->update();
        return back();
    }

    //Add Doctor
    public function getAllPersons(){
        $state = States::all();
        return view('pages.doctors.add_doctor', compact('state'));
    }

    public function store(Request $request){
        $doctors = new Doctors();
        $doctors->name = $request->post('nameAdd');
        $doctors->surname = $request->post('surnameAdd');
        $doctors->email = $request->post('emailAdd');
        $doctors->phone_number = $request->post('phoneAdd');
        $doctors->doctor_state = $request->post('stateAdd');
        $doctors->password = $request->post('passwordAdd');

        $doctors->save();
        return redirect()->route('doctors_list');

        }

    //Delete Doctor
    public function destroy($id) {
        $doctors = Doctors::find($id);
        $doctors->delete();
        return back();
  }
}
