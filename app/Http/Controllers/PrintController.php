<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PrintController extends Controller
{
    //
    public function index()
    {
          $students = User::all();
          return view('printstudent')->with('students', $students);;
    }
    public function prnpriview()
    {
          $students = User::all();
          return view('students')->with('students', $students);;
    }
}
