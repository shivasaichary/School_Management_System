<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminSchoolController ;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\StudentResultsController;

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth:sanctum'],
], function () {
    Route::resource('schools', AdminSchoolController::class);
    Route::resource('teachers', AdminTeacherController::class);
});

Route::delete('admin/schools/{school}', [AdminSchoolController::class, 'destroy'])->name('admin.schools.delete');

// Route::post('admin/schools', [SchoolController::class, 'create'])->name('admin.schools.store');


// Route::get('teacher', [TeacherController::class, 'index']);

Route::post('admin/teachers',[AdminTeacherController::class, 'store'])->name('admin.teachers.store');

Route::get('admin/teachers/{teacher}', [AdminTeacherController::class, 'destroy'])->name('admin.teachers.delete');

Route::get('admin/results', [StudentResultsController::class, 'index'])->name('admin.results.index');

