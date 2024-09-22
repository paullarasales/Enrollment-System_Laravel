<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\SubjectController;

Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [AdminPagesController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/manage-students', [AdminPagesController::class, 'manageStudents'])->name('admin.manageStudents');
    Route::get('/admin/enrolled-students', [AdminPagesController::class, 'enrolledStudents'])->name('admin.enrolledStudents');
    Route::get('/first-year/students', [AdminPagesController::class, 'enrolledStudentsOne'])->name('student.firstYear');
    Route::get('/second-year/students', [AdminPagesController::class, 'enrolledStudentsTwo'])->name('student.secondYear');
    Route::get('/third-year/students', [AdminPagesController::class, 'enrolledStudentsThree'])->name('student.thirdYear');
    Route::get('/fourth-year/students', [AdminPagesController::class, 'enrolledStudentsFour'])->name('student.fourthYear');
    Route::get('/admin/manage-subjects', [AdminPagesController::class, 'manageSubjects'])->name('admin.manageSubjects');
    Route::post('/student/store', [StudentAccountController::class, 'store'])->name('students.store');
    Route::get('/student/{id}/edit', [StudentAccountController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}/update', [StudentAccountController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}/delete', [StudentAccountController::class, 'delete'])->name('student.delete');
    Route::post('/add/subjects', [SubjectController::class, 'add'])->name('subject.store');
    Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::put('/subject/{id}/update', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{id}/delete', [SubjectController::class, 'delete'])->name('subject.delete');
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
    Route::get('/enrollment/status', [EnrollmentController::class, 'checkStatus']);
});