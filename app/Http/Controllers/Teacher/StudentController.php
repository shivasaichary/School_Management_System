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
    public function create(): Response
    {
        return Inertia::render('Teacher/Students/Create', [
            'classes' => Cls::all(['id', 'name']),
            'cls_id' => request('cls_id'),
        ]);
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        Student::create($request->validated());

        return to_route('teacher.section')
            ->withStatus('Student created successfully.');
    }

    public function edit(Student $student)
    {
        return Inertia::render('Teacher/Students/Edit', [
            'classes' => Cls::get(['id', 'name']),
            'student'    => $student,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('teacher.students.index')
            ->with('status', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return to_route('teacher.section')
            ->withStatus('Student deleted successfully.');
    }
}
