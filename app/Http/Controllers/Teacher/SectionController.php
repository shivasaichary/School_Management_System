<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cls;
use Inertia\Inertia;
use Inertia\Response;

class SectionController extends Controller
{
    public function index(): Response
    {
        $this->authorize('cls.viewAny');
        return Inertia::render('Teacher/Section', [
            'classes' => Cls::query()
                ->where('school_id', auth()->user()->school->id)
                ->with('students')
                ->get(),
        ]);
    }
}
