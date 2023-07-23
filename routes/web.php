<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Program;
use Illuminate\Support\Facades\Route;

Route::get('/',        [PageController::class, 'home'])->name('home');
Route::post('/login',  [LoginController::class, 'login'])->name('login');
Route::get('/to-home', [PageController::class, 'dashboard'])->name('dashboard');

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
    Route::get('/',                [PageController::class, 'advisor'])->name('advisor.dashboard');
    Route::get('/courses/{id}',    [CourseController::class, 'show'])->name('courses.show');
    Route::get('/activities/{id}', [PageController::class, 'advisor_activity'])->name('advisor.activity');
});

Route::prefix('dean')->middleware('role:3')->group(function () {
    Route::get('/', [PageController::class, 'dean'])->name('dean.dashboard');
});

Route::post('/users', [UserController::class, 'register'])->name('users.register');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::post('/proposals', [ProposalController::class, 'store'])->name('store.proposal');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/autocomplete', [ActivityController::class, 'search']);
Route::get('/radio-semesters', [ProgramController::class, 'getRadioButtons']);
Route::get('/autocomplete-student', [StudentController::class, 'search']);

// Route::post('/activities', [ActivityController::class, 'store'])->name('store.team');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
