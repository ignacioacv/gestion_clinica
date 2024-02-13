<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use App\Models\NursingStaff;
use App\Models\Patients;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function reportDoctor(){
        $doctors= Doctors::all();

        //loadView = hace referencia a la vista que va cargar el pdf
        $pdf = Pdf::loadView('pdf.r_doctor', compact('doctors'));
        //le asignamos al usuario que lo visualice y como opcion lo puede descargar
        return $pdf->stream();
    }

    public function reportPatient(){
        $patient= Patients::all();

        //loadView = hace referencia a la vista que va cargar el pdf
        $pdf = Pdf::loadView('pdf.r_patient', compact('patient'));
        //le asignamos al usuario que lo visualice y como opcion lo puede descargar
        return $pdf->stream();
    }

    public function reportNurse(){
        $nurse= NursingStaff::all();

        //loadView = hace referencia a la vista que va cargar el pdf
        $pdf = Pdf::loadView('pdf.r_nurse', compact('nurse'));
        //le asignamos al usuario que lo visualice y como opcion lo puede descargar
        return $pdf->stream();
    }
}
