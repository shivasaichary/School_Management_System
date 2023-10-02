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
use App\Http\Requests\Admin\UpdateSchoolRequest;

use App\Notifications\PrincipalInvitation;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;
// use App\Notifications\SchoolUserInvitation;


class AdminSchoolController extends Controller
{
    public function index(): Response
    {

        $user = Auth()->user();

        return Inertia::render('Admin/Schools/Index', [
            'schools' => School::with(['city', 'principal'])->get(),
        ]);
    }

    public function create()
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_school', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }

        return Inertia::render('Admin/Schools/Create', [
            'cities' => City::get(['id', 'name']),
        ]);
    }

    public function store(StoreSchoolRequest $request)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_school', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }

        // $validated = $request->validated();

        $user = User::create([
            'name'     => $request['principal_name'],
            'email'    => $request['email'],
            'password' => '',
        ]);

        // $user->roles()->sync(Role::where('name', RoleName::TEACHER->value)->first());

         School::create([
            'principal_code' => $user->id,
            'city_id' => $request['city_id'],
            'principal_name' => $request['principal_name'],
            'school_name' => $request['school_name'],
            'address' => $request['address'],
            'email' => $request['email'],
            'school_code' => 'TES-' . rand(10, 999),
        ]);


        return redirect()->route('admin.schools.index')->with('status', 'school created Successfully');
    }

    public function edit(School $school): Response
    {

        $user = Auth()->user();

        if (!$user->hasPermissionTo('update_school', 'web')) {
            return response('Unauthorize');
        }


        return Inertia::render('Admin/Schools/Edit', [
            'school' => $school,
            'cities' => City::get(['id', 'name']),
        ]);
    }

    public function update( School $school, UpdateSchoolRequest $request)
    {
        // dd($request);

        $user = auth()->user();
        if (!$user->hasPermissionTo('update_school', 'web')) {
            return response('Unauthorize');
        }

        $school->update([
            'principal_name' => $request['principal_name'],
            'email' => $request['email'],
            'city_id' => $request['city_id'],
            'school_name' => $request['school_name'],
            'address' => $request['address'],
        ]);

        return redirect()->route('admin.schools.index')
            ->withStatus('school updated successfully.');
    }

    public function show(School $school): Response
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('view_school', 'web')) {
            return response('Unauthorize');
        }
        $school->load(['city', 'principal', 'teachers', 'students']);

        return Inertia::render('Admin/Schools/Show', [
            'school' => $school,
        ]);
    }

    public function destroy(School $school): RedirectResponse
    {

        $user = Auth()->user();

        if (!$user->hasPermissionTo('delete_school', 'web')) {
            return response('Unauthorize');
        }
        $school->delete();

        return redirect()->route('admin.schools.index')->with('status', 'School deleted successfully.');
    }
}
