<?php

namespace App\Http\Controllers\Teacher;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Parents;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreParentRequest;
use App\Http\Requests\Teacher\UpdateParentRequest;
use Illuminate\Http\RedirectResponse;

class StudentParentController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $parents = Parents::all();

        if (!$user->hasPermissionTo('view_parent', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Parents/Index', [
            'parents' => $parents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {

        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_parent', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Parents/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParentRequest $request)
    {
        $user = auth()->user();

        if (!$user->hasPermissionTo('create_parent', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }
        Parents::create([
            'parent_name'=>$request['parent_name'],
            'age'=>$request['age'],
            'gender'=>$request['gender'],
            'phone_number'=>$request['phone_number'],
            'email'=>$request['email'],
            'address'=>$request['address']
        ]);

        return redirect()->route('teacher.parents.index')->withStatus('Parent Record Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parents $parent): Response
    {
        return Inertia::render('Teacher/Parents/Index', [
            'parent' => $parent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parents $parent): Response
    {
        $user = Auth()->user();
        if (!$user->hasPermissionTo('update_parent', 'web')) {
            return response('Unauthorize');
        }

        return Inertia::render('Teacher/Parents/Edit', [
            'parent'    => $parent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParentRequest $request, Parents $parent): RedirectResponse
    {
        $user = auth()->user();

        if (!$user->hasPermissionTo('update_parent', 'web')) {
            return response('Unauthorized');
        }

        $validated = $request->validated();

        $parent->update($validated);

        return redirect()->route('teacher.parents.index')
            ->with('status', 'Parent Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parents $parent)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('delete_parent', 'web')) {
            return response('Unauthorized');
        }

        $parent->delete();

        return redirect()->route('teacher.parents.index')
            ->withStatus('Parent Record deleted successfully.');
    }
}
