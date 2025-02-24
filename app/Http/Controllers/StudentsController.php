<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function myWelcomeView()
    {
        $students = Students::all();
        return view('welcome', compact('students'));
    }

    public function createNewStd(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'age' => 'required|numeric',
            'gender' => 'required|max:6',
            'address' => 'required'
        ]);

        Students::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address
        ]);

        return back()->with('success', 'Student added successfully!');
    }

    public function updateStd(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:30',
            'age' => 'required|numeric',
            'gender' => 'required|max:6',
            'address' => 'required'
        ]);

        $student = Students::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address
        ]);

        return back()->with('success', 'Student updated successfully!');
    }

    public function deleteStd($id)
    {
        $student = Students::findOrFail($id);
        $student->delete();

        return back()->with('success', 'Student deleted successfully!');
    }
}
