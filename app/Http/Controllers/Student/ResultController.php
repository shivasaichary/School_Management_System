<?php

namespace App\Http\Controllers\Student;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return Inertia::render('Student/Result/Index');
    }

    // public function index()
    // {
    //     try {
    //         $results = DB::table('results')->orderBy('id', 'asc')->get();
    //         return response()->json($results);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Internal Server Error'], 500);
    //     }
    // }

    // public function show($studentId)
    // {
    //     try {
    //         $results = DB::table('results')
    //             ->where('student_id', $studentId)
    //             ->orderBy('id', 'asc')
    //             ->get();
    //         return response()->json($results);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Internal Server Error'], 500);
    //     }
    // }
}
