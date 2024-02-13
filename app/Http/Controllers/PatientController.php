<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patient = Patients::select('id', 'name', 'surname', 'email', 'phone_number', 'password')->get();

        return view('pages.patient.patient', compact('patient'));
    }

    //update
    public function update(Request $request, $id){
        $patient = Patients::find($id);
        $patient->name = $request->post('nameEdit');
        $patient->surname= $request->post('surnameEdit');
        $patient->email = $request->post('emailEdit');
        $patient->phone_number = $request->post('phone_numberEdit');
        $patient->password = $request->post('passwordEdit');

        $patient->update();
        return back();
    }

    //Add 
    public function create()
    {
        return view('pages.patient.add_patient');
    }

    public function store(Request $request){
        $patient= new Patients();
        $patient->name = $request->post('nameAdd');
        $patient->surname = $request->post('surnameAdd');
        $patient->email = $request->post('emailAdd');
        $patient->phone_number = $request->post('phoneAdd');
        $patient->password = $request->post('passwordAdd');

        $patient->save();
        return redirect()->route('patient_list');

        }

    //Delete 
    public function destroy($id) {
        $patient = Patients::find($id);
        $patient->delete();
        return back();
  }

}
