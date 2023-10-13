<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Borrowed;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }
//    public function viewAllData()
//    {
//        $borrowedData = Borrowed::all();
//
//        return view('borrowed.index', compact('borrowedData'));
//    }


    public function viewAllData()
    {
        $borrowedData = Borrowed::all();

        if (!$borrowedData->isEmpty()) {
            return view('dashboard',[
                'borrowedData'=>$borrowedData
            ]);
        } else {

            return view('dashboard', compact('borrowedData'))->with('message', 'No items found.'); // You can display a message in the view if no data is found.
        }
    }

    public function search(Request $request)
    {
        $regNum = $request->input('reg_num');
        $student = Student::where('reg_num', $regNum)->first();


        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.')->with('style', 'color: red; font-weight: bold;');
        }
        return view('students.search', ['student' => $student]);
    }

    public function return(Request $request)
    {
        $regNum = $request->input('reg_num');
        $student = Student::where('reg_num', $regNum)->first();


        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.')->with('style', 'color: red; font-weight: bold;');
        }
        return view('students.return-book', ['student' => $student]);
    }

    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('new_status');

        if (!in_array($newStatus, [0, 1])) {
            return redirect()->back()->with('error', 'Invalid status value');
        }

        // Assuming you have a "Borrowed" model for your "borrowed" table
        $borrowed = Borrowed::where('id', $id)->first();

        if ($borrowed) {
            $borrowed->status = $newStatus;
            $borrowed->save();
            return redirect()->back()->with('success', 'Status updated successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }



    public function saveStudent(Request $request)
    {

        // Retrieve data from the request
        $regNum = $request->input('reg_num');
        $name = $request->input('name');
        $program = $request->input('program');
        $barcode = $request->input('barcode');

        // Create a new Borrowed model instance and set its properties
        $borrowed = new Borrowed();
        $borrowed->reg_num = $regNum;
        $borrowed->name = $name;
        $borrowed->program = $program;
        $borrowed->barcode = $barcode;

        // Save the data to the "borrowed" table
        $borrowed->save();

        // Return a response, such as a success message or a JSON response
//        return response()->json(['message' => 'Student details saved successfully']);
        return redirect()->route('students.index')->with('success', 'Student details saved successfully');
    }


}
