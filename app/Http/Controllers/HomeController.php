<?php

namespace App\Http\Controllers;

// use App\Models\Restaurant;
use App\Models\School;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Home', [
            'schools' => School::get(),
        ]);
    }
}
