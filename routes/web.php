<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\StudentController;
use App\Models\Book;
use App\Models\Course;
use App\Models\Purchase;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('index');

Route::resource("book", BookController::class);

Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
Route::post('/courses', [CourseController::class, 'store'])->name('course.store');
Route::get("/courses/{course}", [CourseController::class, 'edit'])->name('course.edit');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

Route::resource("student", StudentController::class);

// dev
// testing route
Route::get("/coffee", CoffeeController::class)->name('coffee');