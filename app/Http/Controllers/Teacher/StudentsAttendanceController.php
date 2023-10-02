<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Cls;
use Inertia\Inertia;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreAttendanceRequest;
use App\Http\Requests\Teacher\UpdateAttendanceRequest;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;



class StudentsAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $attendances = Attendance::all();

        if (!$user->hasPermissionTo('view_attendance', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Attendance/Index', [
            'attendances' => $attendances,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {

        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_attendance', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Attendance/Create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $user = auth()->user();

        if (!$user->hasPermissionTo('create_attendance', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }
        Attendance::create([
            'student_name'=>'student',
            'student_code'=>'TES-ID'.rand(1,999),
            'date'=>$request['date'],
            'status'=>$request['status'],
        ]);

        return redirect()->route('teacher.attendance.index')->withStatus('Attendance Record Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance):Response
    {
        return Inertia::render('Teacher/Attendance/Index', [
            'attendance' => $attendance,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance):Response
    {
        $user = Auth()->user();
        if (!$user->hasPermissionTo('update_attendance', 'web')) {
            return response('Unauthorize');
        }

        return Inertia::render('Teacher/Attendance/Edit', [
            'attendance'    => $attendance,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance):RedirectResponse
    {
        $user = auth()->user();

        if (!$user->hasPermissionTo('update_teacher', 'web')) {
            return response('Unauthorized');
        }

        $validated = $request->validated();

        $attendance->update($validated);

        return redirect()->route('teacher.attendance.index')
            ->with('status', 'Attendance Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('delete_attendance', 'web')) {
            return response('Unauthorized');
        }

        $attendance->delete();

        return redirect()->route('teacher.attendance.index')
            ->withStatus('Attendance Record deleted successfully.');

    }
}
