<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function myWelcomeView()
    {
        $students = Students::all();
        $users = User::all();
        return view('welcome', compact('students', 'users'));
    }
}