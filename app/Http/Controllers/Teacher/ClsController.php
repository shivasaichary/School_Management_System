<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Cls;
use App\Http\Requests\Teacher\StoreClsRequest;
use App\Http\Requests\Teacher\UpdateClsRequest;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\RedirectResponse;
use Termwind\Components\Dd;

class ClsController extends Controller
{
    public function index(): Response
    {

        $user = Auth()->user();

        $classes = Cls::all();

        if (!$user->hasPermissionTo('view_class', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Classes/Index', [
            'classes' => $classes,
        ]);
    }

    public function create()
    {
        $user = Auth()->user();
        // Dd($user);

        if (!$user->hasPermissionTo('create_class', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Classes/Create');
    }

    public function store(StoreClsRequest $request)
    {

        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_class', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }

         cls::create([
            'class_name' => $request['class_name'],
            'teacher_name' => $request['teacher_name'],
            'subject' => $request['subject'],
            'section' => $request['section'],
            'starting_time' => $request['starting_time'],
            'ending_time' => $request['ending_time'],
        ]);

        return redirect()->route('teacher.classes.index')
            ->withStatus('student classes created successfully.');
    }

    public function edit($cls): Response
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('update_class', 'web')) {
            return response('Unauthorize');
        }

        $clas = Cls::find($cls);

        return Inertia::render('Teacher/Classes/Edit', [
            'cls' => $clas,
        ]);
    }

    public function update(UpdateClsRequest $request, cls $cls)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('update_class', 'web')) {
            return response('Unauthorized');
        }

        $validated =$request->validated();

        $cls->update($validated);

        return redirect()->route('teacher.classes.index')->withStatus('student class updated successfully.');
    }

    public function destroy($cls): RedirectResponse
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('delete_class', 'web')) {
            return response('Unauthorize');
        }

        $clas = Cls::find($cls);

        $clas->delete();

        return redirect()->route('teacher.classes.index')
            ->withStatus('student Class deleted successfully.');
    }

    public function show(Cls $cls):Response
    {
        return Inertia::render('Teacher/Classes/Index', [
            'cls' => $cls,
        ]);
    }
}
