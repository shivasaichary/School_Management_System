<?php

use App\Http\Controllers\Teacher\SectionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\ClsController;

use App\Models\Cls;
use App\Models\Student;

Route::group([
    'prefix'     => 'teacher',
    'as'         => 'teacher.',
    'middleware' => ['auth'],
], function () {
    Route::get('Section', [SectionController::class, 'index'])->name('Section');
    Route::resource('classes', ClsController::class);
    Route::resource('students', StudentController::class);

    // Route::resource('students', StudentController::class);
});
