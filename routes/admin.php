<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentResultsController;

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth'],
], function () {
    Route::resource('/schools', SchoolController::class);
    Route::resource('/teachers', TeacherController::class);
});

Route::get('teacher', [TeacherController::class, 'index']);
Route::get('admin/results', [StudentResultsController::class, 'index'])->name('admin.results.index');
