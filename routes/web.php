<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropositionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/to-home', [PageController::class, 'dashboard'])->name('dashboard');

Route::get('/admin', [PageController::class, 'admin'])->name('admin');
Route::get('/student', [PageController::class, 'student'])->name('student.dashboard');
Route::get('/advisor', [PageController::class, 'advisor'])->name('advisor.dashboard');
Route::get('/dean', [PageController::class, 'dean'])->name('dean.dashboard');

Route::get('/course/{courseId}/team', [PageController::class, 'team'])->name('student.team');

Route::get('/advisor/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/activities/new/{courseId}', [ActivityController::class, 'create'])->name('activities.create');
Route::get('/advisor/activities/{id}', [PageController::class, 'advisor_activity'])->name('advisor.activity');
Route::get('/student/activities/{id}', [PageController::class, 'student_activity'])->name('student.activity');

Route::get('/student/activities/{id}/propositions/form', [PageController::class, 'proposition_form'])->name('proposition.form');

Route::get('/admin/users', [PageController::class, 'users'])->name('users');
Route::get('/admin/users/register', [PageController::class, 'register'])->name('register');

Route::post('/users', [UserController::class, 'register'])->name('users.register');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::post('/propositions', [PropositionController::class, 'store'])->name('store.proposition');
// Route::post('/activities', [ActivityController::class, 'store'])->name('store.team');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


Route::get('/autocomplete', [ActivityController::class, 'search']);
Route::get('/autocomplete-student', [StudentController::class, 'search']);
