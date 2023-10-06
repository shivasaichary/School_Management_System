<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\Student\ResultController;
use App\Http\Controllers\Student\ClassTimetablesController;
use App\Http\Controllers\Student\StudentAttendanceController;

// use App\Http\Controllers\SchoolController;
// use App\Http\Controllers\Student\StudentController;

Route::group([
    'prefix'     => 'student',
    'as'         => 'student.',
    'middleware' => ['auth:sanctum'],
], function () {
    Route::resource('student', StudentAttendanceController::class);
    Route::resource('student', ClassTimetablesController::class);
    Route::resource('student', ResultController::class);
});

Route::get('/student-home', [HomeController::class, 'studentHome'])->name('student.home');

Route::get('student/attendance', [StudentAttendanceController::class, 'index'])->name('student.attendance.index');

Route::get('student/classtimetables', [ClassTimetablesController::class, 'index'])->name('student.classtimetables.index');

Route::get('student/result', [ResultController::class, 'index'])->name('student.result.index');


Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe')->name('stripe.index');
    Route::get('stripe/checkout', 'stripeCheckout')->name('stripe.checkout');
    Route::get('stripe/checkout/success', 'stripeCheckoutSuccess')->name('stripe.checkout.success');
});
