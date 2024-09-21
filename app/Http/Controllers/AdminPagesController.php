<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAccount;
use App\Models\Section;

class AdminPagesController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function manageStudents()
    {
        $students = StudentAccount::all();
        $sections = Section::all();
        return view('admin.manage-students', compact('students', 'sections'));
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
