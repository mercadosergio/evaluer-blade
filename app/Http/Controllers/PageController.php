<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Draft;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        // if (!Auth::check()) {
        //     return redirect('/');
        // }
        return view('home');
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function student()
    {
        $user = User::with('student.courses')->find(Auth::id());

        return view('student.index', compact('user'));
    }

    public function advisor()
    {
        $user = User::with('advisor.courses')->find(Auth::id());
        $advisor = $user->advisor;

        if ($advisor) {
            $courses = $advisor->courses;
        } else {
            $courses = null;
        }
        return view('advisor.index', compact('courses', 'advisor'));
    }

    public function dean()
    {
        return view('dean.index');
    }

    public function users()
    {
        return view('users.show');
    }

    public function register()
    {
        $roles = Role::all();
        $programs = Program::all();
        return view('users.register', ['roles' => $roles, 'programs' => $programs]);
    }

    public function advisor_activity(string $id)
    {
        $activity = Activity::findOrFail($id);
        return view('advisor.activity', compact('activity'));
    }

    public function student_activity(string $id)
    {
        $activity = Activity::findOrFail($id);
        $user = User::with('student.teams')->find(Auth::id());
        $team = $user->student->teams[0];

        $draft = Draft::where('team_id', $team->id)
            ->where('activity_id', $activity->id)
            ->first();
        return view('student.activity', compact('activity', 'team', 'draft'));
    }

    public function team($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('student.team', compact('course'));
    }
}
