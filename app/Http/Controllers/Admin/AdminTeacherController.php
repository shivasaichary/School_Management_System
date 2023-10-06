<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\StoreTeacherRequest;
use App\Http\Requests\Admin\UpdateTeacherRequest;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $user = Auth()->user();

        $teachers = Teacher::all();

        if (!$user->hasPermissionTo('view_teacher', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Admin/Teachers/Index', [
            'teachers' => $teachers,
        ]);
    }

    public function show(Teacher $teacher): Response
    {
        return Inertia::render('Admin/Teachers/Index', [
            'teacher' => $teacher,
        ]);
    }

    public function create(): Response
    {

        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_teacher', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Admin/Teachers/Create');
    }

    public function store(StoreTeacherRequest $request)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_teacher', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }

        Teacher::create([
            'teacher_code' => 'TET-ID' . rand(1, 999),
            'teacher_name' => $request['teacher_name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'phone_number' => $request['phone_number'],
            'subject' => $request['subject'],
            'age' => $request['age'],
            'date_of_birth' => $request['date_of_birth'],
            'gender' => $request['gender']
        ]);

        return redirect()->route('admin.teachers.index')->with('status', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher): Response
    {

        $user = Auth()->user();

        if (!$user->hasPermissionTo('update_teacher', 'web')) {
            return response('Unauthorize');
        }

        return Inertia::render('Admin/Teachers/Edit', [
            'teacher' => $teacher,
        ]);
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher): RedirectResponse
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('update_teacher', 'web')) {
            return response('Unauthorized');
        }

        $validated = $request->validated();

        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')->with('status', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('delete_teacher', 'web')) {
            return response('Unauthorized');
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('status', 'Teacher deleted successfully.');
    }
}
