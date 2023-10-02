<?php

namespace App\Http\Controllers\Student;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassTimetablesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return Inertia::render('Student/ClassTimetables/Index');
    }
}
