<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Admin;
use App\Models\Advisor;
use App\Models\Course;
use App\Models\Coordinator;
use App\Models\Draft;
use App\Models\ResearchArea;
use App\Models\Program;
use App\Models\Role;
use App\Models\Student;
use App\Models\Submission;
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

    public function dashboard()
    {
        $user = User::find(Auth::id());
        if ($user) {
            switch ($user->role_id) {
                case 1:
                    return redirect()->route('student.dashboard');
                    break;
                case 2:
                    return redirect()->route('advisor.dashboard');
                    break;
                case 3:
                    return redirect()->route('coordinator.dashboard');
                    break;
                case 4:
                    return redirect()->route('admin');
                    break;
            }
        } else {
            return redirect('/');
        }
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

    public function coordinator()
    {
        $program = Program::findOrFail(Auth::user()->coordinator->program_id);
        return view('coordinator.index', compact('program'));
    }

    public function users()
    {
        $students = Student::with('user')->get();
        $advisors = Advisor::with('user')->get();
        $coordinators = Coordinator::with('user')->get();
        // $admins = Admin::with('user')->get();

        return view('users.show', compact('students', 'advisors', 'coordinators'));
    }

    public function register()
    {
        $roles = Role::all();
        $programs = Program::all();
        return view('users.register', ['roles' => $roles, 'programs' => $programs]);
    }

    public function advisor_activity(string $id)
    {
        $activity = Activity::with('submissions.proposal')->findOrFail($id);
        return view('advisor.activity', compact('activity'));
    }

    public function student_activity(string $id)
    {
        $activity = Activity::findOrFail($id);
        $user = User::with('student.teams.students')->find(Auth::id());
        $team = $user->student->teams[0];

        $submission = Submission::where('team_id', $team->id)
            ->where('activity_id', $activity->id)
            ->first();
        return view('student.activity', compact('activity', 'team', 'submission'));
    }

    public function team($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('student.team', compact('course'));
    }

    public function proposal_form(string $id)
    {
        $activityId = $id;
        $user = User::with('student.program', 'student.teams.students', 'student.courses.advisor')->find(Auth::id());
        $student = $user->student;
        $members = $student->teams[0]->students;
        $lines = ResearchArea::where('program_id', $user->student->program->id)->get();
        // dd($student->courses[0]->advisor);
        return view('proposals.form', compact('activityId', 'student', 'lines', 'members'));
    }

    public function programs()
    {
        $programs = Program::all();

        return view('admin.programs.show', compact('programs'));
    }
}
