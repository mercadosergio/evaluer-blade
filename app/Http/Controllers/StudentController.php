<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        $request->validate([
            'names' => 'required',
            'first_lastname' => 'required',
            'second_lastname' => 'required',
            'dni' => 'required',
            'program' => 'required',
            'semester' => 'required',
            'user_id' => 'required',
        ]);

        $student = new Student;
        $student->names = $request->names;
        $student->first_lastname = $request->first_lastname;
        $student->second_lastname = $request->second_lastname;
        $student->dni = $request->dni;
        $student->semester = $request->semester;
        $student->user_id = $request->user_id;

        $student->save();
        // return redirect()->route('')
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
