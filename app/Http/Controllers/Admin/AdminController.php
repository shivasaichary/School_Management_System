<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Role;
use App\Models\User;
use App\Models\City;
use App\Enums\RoleName;
use App\Http\Requests\Admin\StoreSchoolRequest;
use App\Http\Requests\Admin\UpdateSchoolRequest;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    public function index(): Response
    {
        $this->authorize('admin.viewSchools');

        return Inertia::render('Admin/Schools/Index', [
            'schools' => School::with(['city', 'student', 'teachers'])->get(),
        ]);
        //  return redirect()->route('admin.schools.index');
    }

    public function create()
    {
        $this->authorize('admin.createSchools');

        return Inertia::render('Admin/Schools/Create', [
            'cities' => City::get(['id', 'name']),
        ]);
    }

    public function store(StoreSchoolRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated) {
            // Create a new School
            $school = School::create([
                'city_id' => $validated['city_id'],
                'name'    => $validated['school_name'],
                'address' => $validated['address'],
            ]);

            // Create an Admin User for the School
            $user = User::create([
                'name'     => $validated['admin_name'],
                'email'    => $validated['email'],
                'password' => '',
            ]);

            $user->roles()->sync(Role::where('name', RoleName::ADMIN->value)->first());
            $user->school()->associate($school)->save();

            // Notify the Admin User with an invitation

            // You can implement this part based on your notification system
        });

        return redirect()->route('admin.schools.index')->with('status', 'School created successfully.');
    }

    public function edit(School $school): Response
    {
        $this->authorize('admin.updateSchools');

        $school->load(['city', 'student', 'teachers']);

        return Inertia::render('Admin/Schools/Edit', [
            'school' => $school,
            'cities' => City::get(['id', 'name']),
        ]);
    }

    public function update(UpdateSchoolRequest $request, School $school): RedirectResponse
    {
        $validated = $request->validated();

        $school->update([
            'city_id' => $validated['city_id'],
            'name'    => $validated['school_name'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('admin.schools.index')->with('status', 'School updated successfully.');
    }

    public function destroy(School $school): RedirectResponse
    {
        $this->authorize('admin.deleteSchools');

        // Implement logic for deleting a school

        return redirect()->route('admin.schools.index')->with('status', 'School deleted successfully.');
    }
}
