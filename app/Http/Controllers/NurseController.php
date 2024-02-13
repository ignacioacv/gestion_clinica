<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NursingStaff;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
        $nurse = NursingStaff::select('id', 'name', 'surname', 'phone_number', 'email', 'password', 'designated_area')->get();

        return view('pages.nurses.nurse', compact('nurse'));
    }

    //update
    public function update(Request $request, $id){
        $nurse = NursingStaff::find($id);
        $nurse->name = $request->post('nameEdit');
        $nurse->surname= $request->post('surnameEdit');
        $nurse->email = $request->post('emailEdit');
        $nurse->phone_number = $request->post('phone_numberEdit');
        $nurse->password = $request->post('passwordEdit');
        $nurse->designated_area = $request->post('designatedEdit');

        $nurse->update();
        return back();
    }

    //Add 
    public function create()
    {
        return view('pages.nurses.add_nurses');
    }

    public function store(Request $request){
        $nurse= new NursingStaff();
        $nurse->name = $request->post('nameAdd');
        $nurse->surname = $request->post('surnameAdd');
        $nurse->phone_number = $request->post('phoneAdd');
        $nurse->email = $request->post('emailAdd');
        $nurse->password = $request->post('passwordAdd');
        $nurse->designated_area = $request->post('designatedAdd');

        $nurse->save();
        return redirect()->route('nurse_list');

        }

    //Delete 
    public function destroy($id) {
        $patient = NursingStaff::find($id);
        $patient->delete();
        return back();
  }

}
