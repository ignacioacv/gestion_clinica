<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalConsultations;

class CalendarController extends Controller
{
    public function index(){
       $allEvents = MedicalConsultations::all();
       $events = [];
       foreach($allEvents as $event){
        $events[] = [
            'title' => $event->description,
            'start' => $event->start_date,
            'end' => $event->end_date,
        ];
       }
       return view('pages.medical_consultations.calendar_visualizer', compact('events'));
    }
}
