<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAccount;

class AdminPagesController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function manageStudents()
    {
        $students = StudentAccount::all();
        return view('admin.manage-students', compact('students'));
    }

    public function enrolledStudents()
    {
        return view('admin.enrolled-students');
    }

    public function manageSubjects()
    {
        return view('admin.manage-subjects');
    }
}
