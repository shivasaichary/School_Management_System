<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\School;
use App\Models\Role;
use App\Models\User;
use App\Models\City;

use Inertia\Inertia;
use Inertia\Response;

use App\Enums\RoleName;
use App\Http\Requests\Admin\StoreSchoolRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Notifications\PrincipalInvitation;
use App\Http\Requests\Admin\UpdateSchoolRequest;

// use App\Notifications\SchoolUserInvitation;


class SchoolController extends Controller
{
    public function index(): Response
    {
        // $this->authorize('school.viewAny');

        return Inertia::render('Admin/Schools/Index', [
            'schools' => School::with(['city', 'principal'])->get(),
        ]);
    }

    public function create()
    {
        $this->authorize('school.create');

        return Inertia::render('Admin/Schools/Create', [
            'cities' => City::get(['id', 'name']),
        ]);
    }

    public function store(StoreSchoolRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'name'     => $validated['principal_name'],
                'email'    => $validated['email'],
                'password' => '',
            ]);

            $user->roles()->sync(Role::where('name', RoleName::TEACHER->value)->first());

            $user = School::create([
                'city_id' => $validated['city_id'],
                'name'    => $validated['school_name'],
                'address' => $validated['address'],
            ]);

            // Attach the admin to the school
            // $school->admin()->associate($admin);
            // $school->save();

            $user->notify(new PrincipalInvitation($validated['school_name']));
        });

        return to_route('admin.schools.index')->with('status', 'school created Successfully');
        // return to_route('admin.school.index');

    }

    public function edit(School $school): Response
    {
        $this->authorize('school.update');

        $school->load(['city', 'principal']);

        return Inertia::render('Admin/Schools/Edit', [
            'school' => $school,
            'cities'     => City::get(['id', 'name']),
        ]);
    }

    public function update(UpdateSchoolRequest $request, School $school): RedirectResponse
    {
        $validated = $request->validated();

        $school->update([
            'city_id' => $validated['city'],
            'name'    => $validated['school_name'],
            'address' => $validated['address'],
        ]);

        return to_route('admin.schools.index')
            ->withStatus('school updated successfully.');
    }

    public function show(School $school): Response
    {
        $this->authorize('school.view');

        $school->load(['city', 'principal', 'teachers', 'students']);

        return Inertia::render('Admin/Schools/Show', [
            'school' => $school,
        ]);

    }
}
