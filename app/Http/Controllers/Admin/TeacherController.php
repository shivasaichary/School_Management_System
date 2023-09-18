<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTeacherRequest;
use App\Http\Requests\Admin\UpdateTeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TeacherController extends Controller
{
    public function index(): Response
    {
        // Fetch a list of teachers and pass them to the view
        $teachers = Teacher::all();

        return Inertia::render('Admin/Teachers/Index', [
            'teachers' => $teachers,
        ]);
    }

    public function create(): Response
    {
        // Render a form to create a new teacher
        $this->authorize('teacher.create');

        return Inertia::render('Admin/Teachers/Create');
    }

    public function store(StoreTeacherRequest $request): RedirectResponse
    {
        // Validate and store the newly created teacher
        $validated = $request->validated();
        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')->with('status', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher): Response
    {
        // Render a form to edit an existing teacher
        $this->authorize('teacher.Edit');
        return Inertia::render('Admin/Teachers/Edit', [
            'teacher' => $teacher,
        ]);
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher): RedirectResponse
    {
        // Validate and update the teacher's information
        $validated = $request->validated();
        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')->with('status', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        // Delete the teacher
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('status', 'Teacher deleted successfully.');
    }
}
