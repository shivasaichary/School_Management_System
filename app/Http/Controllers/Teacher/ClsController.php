<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Cls;
use App\Http\Requests\Teacher\StoreClsRequest;
use App\Http\Requests\Teacher\UpdateClsRequest;
use Illuminate\Http\RedirectResponse;


class ClsController extends Controller
{
    public function index(): Response
    {
        $this->authorize('cls.viewAny');

        $classes = Cls::all();

        return Inertia::render('teacher/classes/Index', [
            'classes' => $classes,
        ]);
    }

    public function create(): Response
    {
        $this->authorize('cls.create');

        return Inertia::render('teacher/classes/Create');
    }

    public function store(StoreClsRequest $request): RedirectResponse
    {
        $request->user()->school->classes()->create($request->only('name'));

        return to_route('teacher.section')
            ->withStatus('student classes created successfully.');
    }

    public function edit($cls): Response
    {
        return Inertia::render('teacher/classes/Edit', [
            'cls' => $cls,
        ]);
    }

    public function update(UpdateClsRequest $request, cls $cls): RedirectResponse
    {
        $cls->update($request->only('name'));

        return to_route('teacher.section')->withStatus('student cls updated successfully.');
    }

    public function destroy(Cls $cls)
    {
        $cls->delete();

        return to_route('teacher.section')
            ->withStatus('student Class deleted successfully.');
    }
}
