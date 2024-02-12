<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoiments;
use App\Models\MedicalConsultations;
use App\Models\Diseases;
use App\Models\PatientsDiseasesTable;
use App\Models\Doctors;
use App\Models\Patients;
use Session;
use Redirect;

class MedicalConsultationController extends Controller
{
    public function index(){
        $medical_consultations = MedicalConsultations::all();
        return view('pages.medical_consultations.medical_consultation', compact('medical_consultations'));
    }

    public function getApoimentDisease($id){
        $diseases = Diseases::all();

        $apoiments = Apoiments::join('doctors', 'apoiments.doctor_id', '=', 'doctors.id')
        ->join('patients', 'apoiments.patient_id', '=', 'patients.id')
        ->join('nursing_staff', 'apoiments.nursing_saff_id', '=', 'nursing_staff.id')
        ->select('apoiments.id', 'apoiments.patient_id', 'apoiments.apoiment_date', 'doctors.name as doctor_name', 'doctors.surname as doctor_surname', 'patients.name as patient_name', 'patients.surname as patient_surname', 'nursing_staff.name as nursing_name', 'nursing_staff.surname as nursing_surname', 'apoiments.description', 'apoiments.completed', 'apoiment_hour')
        ->where('apoiments.id', '=', $id)
        ->get();

        return view('pages.medical_consultations.add_medical_consultation', compact('apoiments', 'id', 'diseases'));
    }

    public function store(Request $request){
        $apoiments = Apoiments::find($request->post('apoiment_id'));
        $apoiments->completed = true;
        $apoiments->save();

        $patientsDiseases = new PatientsDiseasesTable;
        $patientsDiseases->disease_date = $request->post('medical_consultation_date');
        $patientsDiseases->patient_id = $request->post('patient_id');
        $patientsDiseases->disease_id = $request->post('diseases_select');
        $patientsDiseases->save();

        $medical_cons = new MedicalConsultations;
        $medical_cons->apoiment_id = $request->post('apoiment_id');
        $medical_cons->medical_consultation_date = $request->post('medical_consultation_date');
        $medical_cons->description = $request->post('medical_consultation_description');
        $medical_cons->start_date = $request->post('start_date');
        $medical_cons->end_date = $request->post('end_date');

        Session::flash('message', 'El registro se agrego correctamente');
        $medical_cons->save();
        return redirect()->route('medical_consultation_list');
    }

    public function update(Request $request, $id){
        $medical_cons = MedicalConsultations::find($id);
        $medical_cons->description = $request->post('medicalConsultationDescriptionEdit');
        $medical_cons->start_date = $request->post('start_dateEdit');
        $medical_cons->end_date = $request->post('end_dateEdit');
        Session::flash('message', 'El registro se modifico sin problemas.');
        $medical_cons->save();
        return redirect()->route('medical_consultation_list');
    }


}
