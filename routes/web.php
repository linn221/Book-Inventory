<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PurchaseController;
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

// Route::resource("courses", [CourseController::class]);

Route::resource("student", StudentController::class);

Route::get('/coffee', function() {
    // $student = Student::findOrFail(3);

    // $purchases = $student->purchases;
    // $response = '';
    // foreach($purchases as $p) {
    //     $response .= $p->book->name;
    // }
    // $integers = [1, 2, 3, 4, 5, 2, 3, 3, 4];
    // $books = Book::all();
    // return $books->random(Arr::random($integers))->pluck('id')[0];
        // $latest_id = DB::table('students')->latest()->first('id')->id;
        // return $latest_id;
    // return $response;
    // $id_list = $student->purchases->pluck('book_id');
    // $total_bill = Book::whereIn('id', $id_list)->sum('price');
    $student = Student::findOrFail(404);
    return $student->total_bill;
})->name('coffee');

// Route::post();
// Route::get('/coffee', [BookController::class, "coffee"]);
// Route::get("/get/{id}", [BookController::class, 'get']);
// Route::get('/contact/{id}', function(Contact $contact) {
//     // $contact = Contact::findOrFail($id);
//     return $contact;
// });