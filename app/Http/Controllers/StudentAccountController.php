<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAccount;
use App\Models\Section;
use Illuminate\Support\Facades\Log;

class StudentAccountController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Store method callled');
        Log::info($request->all());

        $request->validate([
            'student_number' => 'required|unique:student_accounts',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:6',
            'section_id' => 'required|exists:sections,id',
        ]);
    
        StudentAccount::create([
            'student_number' => $request->student_number,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'password' => bcrypt($request->password),
            'section_id' => $request->section_id,
        ]);
    
        return redirect()->route('admin.manageStudents')->with('success', 'Student added successfully');
    }

    public function edit(string $id)
    {
        $student = StudentAccount::find($id);
        $section = Section::all();
        return view('admin.update-student-view', compact('student', 'section'));
    }
    
    public function update(Request $request, $id)
    {
     
        $student = StudentAccount::findOrFail($id);
        $request->validate([
            'student_number' => 'required|unique:student_accounts,student_number,' . $id,
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'password' => 'nullable|min:6',
            'section_id' => 'required|exists:sections,id',
            'year_level' => 'required',
        ]);

        $student->student_number = $request->student_number;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->year_level = $request->year_level;
        

        if ($request->filled('password')) {
            $student->password = bcrypt($request->password);
        }

        $student->section_id = $request->section_id;
        $student->status = 'not-enrolled';
        $student->save();

        return redirect()->route('admin.manageStudents')->with('success', 'Student updated successfully');
    }


    public function delete($id)
    {
        $student = StudentAccount::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.manageStudents');
    }

}
