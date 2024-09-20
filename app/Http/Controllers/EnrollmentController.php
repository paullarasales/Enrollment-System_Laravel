<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment; // Assuming you have an Enrollment model
use App\Models\Subject;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
		$sections = Section::all();
        return view('index', compact('sections'));
    }

    public function enrollment()
    {
        $sections = Section::all();
        $firstYearSubjects = Subject::where('year_level', 1)->get();

        return response()->json([
            'sections' => $sections,
            'firstYearSubjects' => $firstYearSubjects
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'exists:subjects,id',
        ]);

        $studentId = Auth::user()->id;

        $enrollment = Enrollment::create([
            'student_accounts_id' => $studentId,
            'section_id' => $request->section_id,
        ]);

        $enrollment->subjects()->attach($request->subject_ids);

        return response()->json(['message' => 'Enrollment saved successfully!'], 200);
    }
}
