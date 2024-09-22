<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAccount;
use App\Models\Section;
use App\Models\Subject;

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

    public function enrolledStudents(Request $request)
    {
        $yearLevel = $request->get('year_level', 1);

        $sections = Section::with(['students' => function ($query) use ($yearLevel) {
            $query->where('year_level', $yearLevel)
                  ->where('status', 'enrolled');
        }])->get();

        return view('admin.enrolled-students', compact('sections', 'yearLevel'));
    }

    public function enrolledStudentsOne()
    {
        $sections = Section::with(['students' => function ($query) {
            $query->where('year_level', 1)
            ->where('status', 'enrolled');
        }])->get();
    
        return view('admin.first-year', compact('sections'));
    }
    
    public function enrolledStudentsTwo()
    {
        $sections = Section::with(['students' => function ($query) {
            $query->where('year_level', 2)
            ->where('status', 'enrolled');
        }])->get();
    
        return view('admin.second-year', compact('sections'));
    }
    
    public function enrolledStudentsThree()
    {
        $sections = Section::with(['students' => function ($query) {
            $query->where('year_level', 3)
            ->where('status', 'enrolled');
        }])->get();

        return view('admin.third-year', compact('sections'));
    }
    
    public function enrolledStudentsFour()
    {
        $sections = Section::with(['students' => function ($query) {
            $query->where('year_level', 4)
            ->where('status', 'enrolled');
        }])->get();

        return view('admin.fourth-year', compact('sections'));
    }

    public function manageSubjects()
    {
        $firstYearSubjects = Subject::where('year_level', 1)->get();
        $secondYearSubjects = Subject::where('year_level', 2)->get();
        $thirdYearSubjects = Subject::where('year_level', 3)->get();
        $fourthYearSubjects = Subject::where('year_level', 4)->get();

        return view('admin.manage-subjects', compact('firstYearSubjects', 'secondYearSubjects', 'thirdYearSubjects', 'fourthYearSubjects'));
    }

}
