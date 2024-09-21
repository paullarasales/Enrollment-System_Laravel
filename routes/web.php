<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentAccountController;

Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [AdminPagesController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/manage-students', [AdminPagesController::class, 'manageStudents'])->name('admin.manageStudents');
    Route::get('/admin/enrolled-students', [AdminPagesController::class, 'enrolledSubjects'])->name('admin.enrolledStudents');
    Route::get('/admin/manage-subjects', [AdminPagesController::class, 'manageSubjects'])->name('admin.manageSubjects');
    Route::post('/student/store', [StudentAccountController::class, 'store'])->name('students.store');
});

Route::get('/student/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/login', [StudentAuthController::class, 'login'])->name('student.login');
Route::post('/student/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

Route::middleware('student.auth')->group(function () {
    Route::get('/dashboard', [EnrollmentController::class, 'dashboard'])->name('enrollment.dashboard');
    Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollment.index');
    Route::get('/enrollment/first-year', [EnrollmentController::class, 'enrollment']);
    Route::post('/enrollment/save', [EnrollmentController::class, 'saveEnrollment'])->name('enrollment.save');
    Route::get('/enrollment/current-subjects', [EnrollmentController::class, 'enrolledSubjects'])->name('enrollment.currentSubjects');
});
