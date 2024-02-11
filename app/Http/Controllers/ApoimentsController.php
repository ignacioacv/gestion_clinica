<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApoimentsController extends Controller
{
    public function index(){
        return view('pages.apoiments.apoiments');
    }
}
