<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\EnrollmentController;


Route::get('/student/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/login', [StudentAuthController::class, 'login'])->name('student.login');
Route::post('/student/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

Route::middleware('student.auth')->group(function () {
	Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollment.index');
});

Route::get('/', function () {
    return view('welcome');
});
