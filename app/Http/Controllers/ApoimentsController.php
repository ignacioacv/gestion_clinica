<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoiments;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\NursingStaff;
use Session;
use Redirect;

class ApoimentsController extends Controller
{
    public function index(){
        $apoiments = Apoiments::join('doctors', 'apoiments.doctor_id', '=', 'doctors.id')
        ->join('patients', 'apoiments.patient_id', '=', 'patients.id')
        ->join('nursing_staff', 'apoiments.nursing_saff_id', '=', 'nursing_staff.id')
        ->select('apoiments.id', 'apoiments.apoiment_date', 'doctors.name as doctor_name', 'doctors.surname as doctor_surname', 'patients.name as patient_name', 'patients.surname as patient_surname', 'nursing_staff.name as nursing_name', 'nursing_staff.surname as nursing_surname', 'apoiments.description', 'apoiments.completed', 'apoiment_hour')
        ->where('apoiments.completed', '=', false)
        ->orderBy('apoiments.apoiment_date')
        ->get();
        return view('pages.apoiments.apoiments', compact('apoiments'));
    }

    public function update(Request $request, $id){
        $apoiment = Apoiments::find($id);
        $apoiment->apoiment_date = $request->post('dateApoimentEdit');
        $apoiment->description = $request->post('descriptionApoimentEdit');
        $apoiment->apoiment_hour = $request->post('timeEdit');

        Session::flash('message', 'Actualizado correctamente');
        $apoiment->save();
        return back();
    }

    public function getAllPersons(){
        $doctors = Doctors::all();
        $patients = Patients::all();
        $nursing_staff = NursingStaff::all();
        return view('pages.apoiments.add_apoiment', compact('doctors', 'patients', 'nursing_staff'));
    }

    public function store(Request $request){
        $apoiment = new Apoiments;
        $apoiment->apoiment_date = $request->post('dateApoiment');
        $apoiment->doctor_id = $request->post('doctorAdd');
        $apoiment->patient_id = $request->post('patientAdd');
        $apoiment->nursing_saff_id = $request->post('nursigAdd');
        $apoiment->description = $request->post('descriptionApoiment');
        $apoiment->completed = false;
        $apoiment->apoiment_hour = $request->post('timeAdd');

        //Verificar las fecha y hora de la consulta
        $date = $request->post('dateApoiment');
        $hour = $request->post('timeAdd');
        $busy = false;
        $apoiments = Apoiments::select('apoiment_date', 'apoiment_hour')->where('apoiment_date', '=', $date)->get();
        foreach($apoiments as $apoimentItem){
            if($hour == $apoimentItem->apoiment_hour){
                $busy = true;
                break;
            }
        }

        if($busy){
            Session::flash('message', 'La hora y el dia selecionado no se encuentran disponibles. Por favor ingresa una hora diferente');
            return redirect()->route('apoiments_list');
        }else{
            $apoiment->save();
            Session::flash('message', 'Agregado correctamente');
            return redirect()->route('apoiments_list');
        }
    }
}
