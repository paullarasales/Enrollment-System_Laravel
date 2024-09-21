<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $request->input('username'))->first();

        if ($admin && $admin->password === $request->input('password')) {
            Session::put('admin_id', $admin->id);
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Invalid Username or Password');
        }
    }

    public function logout()
    {
        Session::forget('admin_id');
        return redirect()->route('admin.login');
    }
}
