<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $userId)
    {
        $student = new Student;
        $student->names = $request->name;
        $student->first_lastname = $request->first_lastname;
        $student->second_lastname = $request->second_lastname;
        $student->dni = $request->dni;
        $student->program = $request->program;
        $student->semester = 5;
        $student->entered_at = date('Y');
        $student->user_id = $userId;
        $student->save();
        return back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $student = Student::where('user_id', $user->id)->first();
        $student->names = $request->name;
        $student->first_lastname = $request->first_lastname;
        $student->second_lastname = $request->second_lastname;
        $student->dni = $request->dni;
        $student->program = $request->program;
        $student->semester = 5;
        $student->save();

        return back();
    }

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
