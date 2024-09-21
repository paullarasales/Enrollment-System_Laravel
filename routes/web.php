<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\EnrollmentController;


Route::get('/student/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/login', [StudentAuthController::class, 'login'])->name('student.login');
Route::post('/student/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

Route::middleware('student.auth')->group(function () {
    Route::get('/dashboard', [EnrollmentController::class, 'dashboard'])->name('enrollment.dashboard');
	Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollment.index');
    Route::get('/enrollment/first-year', [EnrollmentController::class, 'enrollment']);
    route::post('/enrollment/save', [EnrollmentController::class, 'saveEnrollment'])->name('enrollment.save');
    Route::get('/enrollment/current-subjects', [EnrollmentController::class, 'enrolledSubjects'])->name('enrollment.currentSubjects');
});

