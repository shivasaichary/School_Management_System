<?php

namespace App\Http\Controllers;

use App\Models\School;
use Inertia\Inertia;
use Inertia\Response;

class SchoolController extends Controller
{
    public function show(School $school): Response
    {
        return Inertia::render('School', [
            'school' => $school->load('classes.students'),
        ]);
    }

    public function index(): Response
    {
        $this->authorize('school.viewAny');

        return Inertia::render('Admin/Schools/Index', [
            'schools' => School::with(['city', 'principal'])->get(),
        ]);
    }
}
