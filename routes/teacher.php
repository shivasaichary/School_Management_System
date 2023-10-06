<?php

use App\Models\Cls;
use App\Models\Student;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\ClsController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\StudentParentController;
use App\Http\Controllers\Teacher\StudentsResultController;
use App\Http\Controllers\Teacher\StudentsAttendanceController;

Route::group([
    'prefix'     => 'teacher',
    'as'         => 'teacher.',
    'middleware' => ['auth:sanctum'],
], function () {
    Route::resource('classes', ClsController::class);
    Route::resource('students', StudentController::class);
    Route::resource('results', StudentsResultController::class);
    Route::resource('attendance', StudentsAttendanceController::class);
    Route::resource('parents', StudentParentController::class);
});

Route::get('/teacher-home', [HomeController::class, 'teacherHome'])->name('teacher.home');

// Route::get('teacher/classes', [ClsController::class, 'index'])->name('teacher.classes.index');
// Route::patch('teacher/classes/edit',[ClsController::class,'update'])->name('teacher.classes.update');
Route::post('teacher/classes/create', [ClsController::class, 'store'])->name('teacher.classes.create');
Route::delete('teacher/classes/{cls}', [ClsController::class, 'destroy'])->name('teacher.classes.delete');

// Route::get('teacher/students', [StudentController::class, 'index'])->name('teacher.students.index');
// Route::patch('teacher/students/edit',[StudentController::class,'update'])->name('teacher.students.update');
Route::post('teacher/students/create', [StudentController::class, 'store'])->name('teacher.students.create');
Route::delete('teacher/students/{student}', [StudentController::class, 'destroy'])->name('teacher.students.delete');

// Route::get('teacher/results', [StudentsResultController::class, 'index'])->name('teacher.results.index');
// Route::patch('teacher/results/edit',[StudentsResultController::class,'update'])->name('teacher.results.update');
Route::post('teacher/results/create', [StudentsResultController::class, 'store'])->name('teacher.results.create');
Route::delete('teacher/results/{result}', [StudentsResultController::class, 'destroy'])->name('teacher.results.delete');

// Route::get('teacher/attendance', [StudentsAttendanceController::class, 'index'])->name('teacher.attendance.index');
// Route::patch('teacher/attendance/edit',[StudentsAttendanceController::class,'update'])->name('teacher.attendance.update');
Route::post('teacher/attendance/create', [StudentsAttendanceController::class, 'store'])->name('teacher.attendance.create');
Route::delete('teacher/attendance/{attendance}', [StudentsAttendanceController::class, 'destroy'])->name('teacher.attendance.delete');

Route::post('teacher/parents/create', [StudentParentController::class, 'store'])->name('teacher.parents.create');
Route::delete('teacher/parents/{parent}', [StudentParentController::class, 'destroy'])->name('teacher.parents.delete');
