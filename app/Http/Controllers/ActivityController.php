<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Course;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        //
    }

    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('advisor.form-activity', compact('course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Activity::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 1,
            'available_from' => strtotime($request->available_from),
            'available_until' => strtotime($request->available_until),
            'type_id' => $request->type_id,
            'course_id' => $request->course_id,
        ]);
        return redirect()->route('advisor.course', ['id' => $request->course_id])->with('success', 'Actividad publicada exitosamente');
    }

    public function show(string $id)
    {
        $activity = Activity::findOrFail($id);
        return view('advisor.form-activity', compact('activity'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('term');
        $types = ActivityType::where('typename', 'LIKE', '%' . $search . '%')->get();

        $result = [];
        foreach ($types as $type) {
            $result[] = [
                'label' => $type->typename,
                'value' => $type->id,
            ];
        }

        return response()->json($result);
    }
}
