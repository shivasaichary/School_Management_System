<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Inertia\Inertia;
use Inertia\Response;


class StudentResultsController extends Controller
{
    public function index(): Response
    {
        $results = Result::all();

        return Inertia::render('Admin/Results/Index', [
            'results' => $results,
        ]);
    }
}