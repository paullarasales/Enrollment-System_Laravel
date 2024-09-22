<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Subject;
use App\Models\Section;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function dashboard()
    {
        return view('welcome');
    }

    public function index()
    {
        $sections = Section::all();

        $student = auth('students')->user();

        $subjects = Subject::where('year_level', $student->year_level)->get();

        $enrolledSubjects = [];
        
        if ($student) {
            $enrolledSubjects = Enrollment::where('student_accounts_id', $student->id)
                ->pluck('subjects_id')
                ->toArray();
        }

        return view('index', compact('sections', 'student', 'subjects', 'enrolledSubjects'));
    }

    

    public function enrollment()
    {
        $sections = Section::all();
        $firstYearSubjects = Subject::where('year_level', 1)->get();
    
        $student = auth('students')->user();
        
        //subjects already enrolled by the student
        $enrolledSubjects = Enrollment::where('student_accounts_id', $student->id)
            ->pluck('subjects_id')
            ->toArray();

        return response()->json([
            'sections' => $sections,
            'firstYearSubjects' => $firstYearSubjects,
            'enrolledSubjects' => $enrolledSubjects,
        ]);
    }

    public function enrollmentSecondYear()
    {
        $sections = Section::all();
        $secondYearSubjects = Subject::where('year_level', 2)->get();

        $student = auth('students')->user();

        $enrolledSubjects = Enrollment::where('student_accounts_id', $student->id)
            ->pluck('subjects_id')
            ->toArray();
        
        return response()->json([
            'sections' => $sections,
            'secondYearSubjects' => $secondYearSubjects,
            'enrolledSubjects' => $enrolledSubjects,
        ]);
    }

    public function saveEnrollment(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'exists:subjects,id',
        ]);

        // Authenticated student
        $student = auth('students')->user();

        if (!$student) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Loop through each selected subject and save enrollment
        foreach ($request->subject_ids as $subjectId) {
            Enrollment::updateOrCreate([
                'student_accounts_id' => $student->id,
                'subjects_id' => $subjectId,
            ]);
        }

        $student->section_id = $request->input('section_id');
        $student->status = 'enrolled';
        $student->save();

        return redirect()->route('enrollment.currentSubjects');
    }

    public function enrolledSubjects()
    {
        $studentId = auth('students')->id();
        $enrolledSubjects = Enrollment::where('student_accounts_id', $studentId)->with('subject')->get();
        return view('enrolledSubjects', compact('enrolledSubjects'));
    }

    public function checkStatus()
    {
        $student = auth('students')->user();

        $status = $student->status;

        return response()->json([
            'status' => $status
        ]);
    }
}
