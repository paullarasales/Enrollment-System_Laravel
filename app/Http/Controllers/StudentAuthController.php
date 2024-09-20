<?php

namespace App\Http\Controllers;

use App\Models\StudentAccount;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class StudentAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('loginForm');
    }

    public function login(Request $request) 
    {
        // dd($request->all());
        $request->validate([
            'student_number' => 'required',
            'password' => 'required'
        ]);

        $student = StudentAccount::where('student_number', $request->input('student_number'))->first();

        if ($student && $student->password === $request->input('password')) {
            Session::put('student_id', $student->id);
            return redirect()->route('enrollment.index');
        } else {
            return back()->with('error', 'Invalid Student ID or Password');
        }
    }

    public function logout() 
    {
        Session::forget('student_id');
        return redirect()->route('student.login');
    }
}
