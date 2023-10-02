<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreResultRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Result;
use Inertia\Response;


class StudentsResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $user = Auth()->user();

        $results = Result::all();

        if (!$user->hasPermissionTo('view_result', 'web')) {
            return response('unauthorize');
        }
        return Inertia::render('Teacher/Results/Index', [
            'results' => $results,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $user = auth()->user();


        if (!$user->hasPermissionTo('create_result', 'web')){
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Results/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request)
    {
        $user = auth()->user();

        if (!$user->hasPermissionTo('create_result', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }

        Result::create([
            'student_code'=>'TES-ID'.rand(1,999),
            'student_name'=>'student',
            'subject_code'=>'TESUB-ID'.rand(1,10),
            'subject_name'=>$request['subject_name'],
            'marks_obtained'=>$request['marks_obtained'],
            'date_of_exam'=>$request['date_of_exam'],
        ]);

        return redirect()->route('teacher.results.index')->with('status', 'Result created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        return Inertia::render('Teacher/Results/Index', [
            'result' => $result,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result):Response
    {
        $user = auth()->user();

        if (!$user->hasPermissionTo('update_result', 'web')) {
            return response('Unauthorize');
        }

        return Inertia::render('Teacher/Results/Edit', [
            'result' => $result,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        $user = auth()->user();

        if (!$user->hasPermissionTo('update_result', 'web')) {
            return response('Unauthorized');
        }

        $validated = $request->validated();

        $result->update($validated);

        return redirect()->route('teacher.results.index')->with('status', 'Result updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result, string $id)
    {
        $user = auth()->user();

        if (!$user->hasPermissionTo('delete_result', 'web')) {
            return response('Unauthorized');
        }

        $result->delete();

        return redirect()->route('teacher.results.index')->with('status', 'result deleted successfully.');

    }
}
