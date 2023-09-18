<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\TeacherController;

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth'],
], function () {
    Route::resource('/schools', SchoolController::class);
    Route::resource('/teachers', TeacherController::class);
});
