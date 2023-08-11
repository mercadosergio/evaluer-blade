<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\Program;
use Illuminate\Support\Facades\Route;

Route::get('/',        [PageController::class, 'home'])->name('home');
Route::post('/login',  [LoginController::class, 'login'])->name('login');
Route::get('/to-home', [PageController::class, 'dashboard'])->name('dashboards');

Route::prefix('admin')->middleware('role:4')->group(function () {
    Route::get('/',               [PageController::class, 'admin'])->name('admin');
    Route::get('/users',          [PageController::class, 'users'])->name('show.users');
    Route::get('/users/register', [PageController::class, 'register'])->name('register');
    Route::get('/programs',       [PageController::class, 'programs'])->name('show.programs');
});

Route::prefix('student')->middleware('role:1')->group(function () {
    Route::get('/',                               [PageController::class, 'student'])->name('student.dashboard');
    Route::get('/activities/{id}/proposals/form', [PageController::class, 'proposal_form'])->name('proposal.form');
    Route::get('/activities/{id}',                [PageController::class, 'student_activity'])->name('student.activity');
    Route::get('/course/{courseId}/team',         [PageController::class, 'team'])->name('student.team');
});

Route::prefix('advisor')->middleware('role:2')->group(function () {
    Route::get('/',                                  [PageController::class, 'advisor'])->name('advisor.dashboard');
    Route::get('/courses/{id}',                      [CourseController::class, 'show'])->name('advisor.course');
    Route::get('/activities/{id}',                   [PageController::class, 'advisor_activity'])->name('advisor.activity');
    Route::get('/course/{courseId}/activities/form', [ActivityController::class, 'create'])->name('create.activity');
});

Route::prefix('coordinator')->middleware('role:3')->group(function () {
    Route::get('/', [PageController::class, 'coordinator'])->name('coordinator.dashboard');
});

Route::post('/users',       [UserController::class, 'register'])->name('users.register');
Route::put('/users/{user}',   [UserController::class, 'update'])->name('update.user');
Route::post('/activities',  [ActivityController::class, 'store'])->name('store.activity');
Route::post('/submissions', [SubmissionController::class, 'store'])->name('store.submission');
Route::post('/posts',       [PostController::class, 'store'])->name('store.post');
Route::post('/teams',       [TeamController::class, 'store'])->name('store.team');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/autocomplete',         [ActivityController::class, 'search']);
Route::get('/radio-semesters',      [ProgramController::class, 'getRadioButtons']);
Route::get('/student-by-dni',       [StudentController::class, 'getByDni']);
Route::get('/autocomplete-student', [StudentController::class, 'search']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
