<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Borrowed;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'barcode' => ['required', 'numeric'],
                'reg_num' => ['required', 'string']
            ]);

            $student = Student::where('reg_num', $request->reg_num)->first();
            if(is_null($student))
            {
                return redirect()->back()->with('error', 'Student not found');
            }

            $student->barcode = $request->barcode;
            $student->save();

            $borrowed = new Borrowed();
            $borrowed->reg_num = $student->reg_num;
            $borrowed->name = $student->name;
            $borrowed->program = $student->program;
            $borrowed->barcode = $student->barcode;
            $borrowed->save();


            return redirect()->back()->with('success', 'successfully checked out the book');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error', 'Exception error contact admin');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
