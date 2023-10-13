<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Borrowed;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return redirect()->route('check-out-search');
        $borrowedData = Borrowed::paginate(10);
        if(isset($request->search_borrowed))
        {
            $borrowedData = Borrowed::where('reg_num', $request->search_borrowed)
            ->orWhere('name', $request->search_borrowed)
            ->orWhere('program', $request->search_borrowed)
            ->orWhere('barcode', $request->search_borrowed)
            ->paginate(10);
        }

        return view('dashboard', [
            'borrowedData' => $borrowedData
        ]);
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
        //
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
