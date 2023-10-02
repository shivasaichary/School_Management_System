<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Parent\ParentController;

Route::group([
    'prefix'     => 'parent',
    'as'         => 'parent.',
    'middleware' => ['auth:sanctum'],
], function () {
    Route::resource('parent', ParentController::class);
});

// Route::get('parent', [ParentController::class, 'result'])->name('parent.studentresult');
Route::get('parent', [ParentController::class, 'attendance'])->name('parent.studentattendance');

Route::get('/parent-home', [HomeController::class, 'parentHome'])->name('parent.home');
