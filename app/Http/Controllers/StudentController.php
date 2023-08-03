<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
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

        Student::create([]);
        return back();
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

    public function search(Request $request)
    {
        $search = $request->input('term');
        $courseId = $request->input('course_id');
        $students = Student::with(['courses' => function ($query) use ($courseId) {
            $query->where('course_id', $courseId);
        }])->where('dni', 'LIKE', '%' . $search . '%')->get();

        // $result = [];

        // foreach ($students as $student) {
        //     $result[] = [
        //         'label' => $student->names . ' ' . $student->first_lastname . ' ' . $student->second_lastname,
        //         'value' => $student->names . ' ' . $student->first_lastname . ' ' . $student->second_lastname,
        //     ];
        // }
        return response()->json($students);
    }

    public function getByDni(Request $request)
    {
        $dni = $request->input('dni');
        $studentData = Student::where('dni', $dni)->first();

        return response()->json($studentData);
    }
}
