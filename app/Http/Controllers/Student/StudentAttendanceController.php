<?php

namespace App\Http\Controllers\Student;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return Inertia::render('Student/Attendance/Index');
    }

}
