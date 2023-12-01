<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/teacher-home', [HomeController::class, 'teacherHome'])->name('teacher.home');
Route::get('/student-home', [HomeController::class, 'studentHome'])->name('student.home');
Route::get('/parent-home', [HomeController::class, 'parentHome'])->name('parent.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/teacher-home', [HomeController::class, 'teacherHome'])->name('teacher.home');

Route::get('admin/school/{school}', [SchoolController::class, 'show'])
    ->name('school');

require __DIR__ . '/auth.php';

Route::middleware(["auth:sanctum", 'isAdmin'])->group(function () {
    require __DIR__ . '/admin.php';
});

// isTeacher
Route::middleware(['auth:sanctum', 'isTeacher'])->group(function () {
    require __DIR__ . '/teacher.php';
});

require __DIR__ . '/student.php';

require __DIR__ . '/parent.php';
