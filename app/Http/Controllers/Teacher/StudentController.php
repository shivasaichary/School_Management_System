<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Cls;
use App\Models\Student;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\Teacher\StoreStudentRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Teacher\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(): Response
    {
        $user = Auth()->user();

        $students = Student::all();

        if (!$user->hasPermissionTo('view_class', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Students/Index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        $user = Auth()->user();
        if (!$user->hasPermissionTo('create_student', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Students/Create');
    }

    public function store(StoreStudentRequest $request)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_student', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }

        Student::create([
            // 'user_id'=>2,
            'student_code'=>'TES-ID'.rand(10,999),
            'student_name'=>$request['student_name'],
            'age'=>$request['age'],
            'gender'=>$request['gender'],
            'phone_number'=>$request['phone_number'],
            'email'=>$request['email'],
            'address'=>$request['address'],
        ]);

        return redirect()->route('teacher.students.index')
            ->withStatus('Student created successfully.');
    }

    public function edit(Student $student):Response
    {
        $user = Auth()->user();
        if (!$user->hasPermissionTo('update_student', 'web')) {
            return response('Unauthorize');
        }

        return Inertia::render('Teacher/Students/Edit', [
            'student'    => $student,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('update_student', 'web')) {
            return response('Unauthorized');
        }

        $validated = $request->validated();

        $student->update($validated);

        return redirect()->route('teacher.students.index')
            ->with('status', 'Student updated successfully.');
    }

    public function destroy(Student $student):RedirectResponse
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('delete_student', 'web')) {
            return response('Unauthorized');
        }

        $student->delete();

        return redirect()->route('teacher.students.index')
            ->withStatus('Student deleted successfully.');
    }

    public function show(STudent $student): Response
    {
        return Inertia::render('Teacher/Students/Index', [
            'student' => $student,
        ]);
    }
}
