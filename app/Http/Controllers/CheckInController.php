<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class CheckInController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }
}
