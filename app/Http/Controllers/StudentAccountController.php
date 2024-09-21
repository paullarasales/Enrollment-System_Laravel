<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAccount;
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
    

}
