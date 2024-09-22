<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'subject_name' => 'required',
            'year_level' => 'required',
            'code' =>  'required'
        ]);

        Subject::create([
            'subject_name' => $request->subject_name,
            'year_level' => $request->year_level,
            'code' => $request->code,
        ]);

        return redirect()->route('admin.manageSubjects')->with('success', 'Subject added successfully');
    }

    public function edit(string $id)
    {
        $subject = Subject::find($id);

        return view('admin.update-subject-view', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'subject_name' => 'required',
            'year_level' => 'required',
            'code' => 'required',
        ]);

        $subject->subject_name = $request->subject_name;
        $subject->year_level = $request->year_level;
        $subject->code = $request->code;

        $subject->save();

        return redirect()->route('admin.manageSubjects')->with('success', 'Subject updated successfully');
    }

    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.manageSubjects');
    }
}
