<?php

namespace App\Http\Controllers;

use spatie\permission\traits\hasRole;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function index(): Response
    // {
    //     if(Auth::user()->hasRole('Admin')) {
    //         return Inertia::render('Home', [
    //             'schools' => School::get(),
    //         ]);
    //     }

    //     if(Auth::user()->hasRole('Teacher')) {
    //         $teacher = Teacher::find(2);

    //         return Inertia::render('TeacherHome', [
    //             'teacher' => $teacher,
    //         ]);
    //     }

    //     if(Auth::user()->hasRole('Student')) {

    //     }

    //     if(Auth::user()->hasRole('Parent')) {

    //     }

    //     $guest = Guest::find(2);

    //     return Inertia::render('GuestHome', [
    //         'guest' => $guest,
    //     ]);
    // }


    public function index(): Response
    {
        return Inertia::render('Home', [
            'schools' => School::get(),
        ]);
    }
    public function teacherHome(): Response
    {
        $teacher = Teacher::find(2);

        return Inertia::render('TeacherHome', [
            'teacher' => $teacher,
        ]);
    }
}
