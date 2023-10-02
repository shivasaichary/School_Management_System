<?php

namespace App\Http\Controllers\Parent;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function result()
    {
        $user = auth()->user();
        return Inertia::render('Parent/StudentResult');
    }

    public function attendance()
    {
        $user = auth()->user();
        return Inertia::render('Parent/StudentAttendance');
    }
}
