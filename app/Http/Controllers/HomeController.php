<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use spatie\permission\traits\hasRole;

class HomeController extends Controller
{
    public function __construct()
    {
        // dd(auth()->check());
        // if (auth()->check()) {
        //     if (auth()->user()->user_type == 'teacher') {
        //         return redirect()->route("teacher.home");
        //     }
        // }
    }
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


    public function index()
    {
        // dd(auth()->user());

        if (auth()->check()) {
            if (auth()->user()->user_type == 'teacher') {
                return redirect()->route("teacher.home");
            }
            if (auth()->user()->user_type == 'student') {
                return redirect()->route("student.home");
            }
            if (auth()->user()->user_type == 'parent') {
                return redirect()->route("parent.home");
            }
        }

        return Inertia::render('Home', [
            'schools' => School::get(),
        ]);
    }
    public function teacherHome()
    {
        $teacher = Teacher::find(2);

        return Inertia::render('TeacherHome', [
            'teacher' => $teacher,
        ]);
    }
    public function studentHome()
    {
        $student = Student::find(3);

        return Inertia::render('StudentHome', [
            'student' => $student,
        ]);
    }
    public function parentHome()
    {
        $parent = Parents::find(4);

        return Inertia::render('ParentHome', [
            'parent' => $parent,
        ]);
    }
}
