<?php

use App\Http\Controllers\BookController;
use App\Models\Contact;
use Illuminate\Http\Request;
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
})->name('coffee');

Route::resource("book", BookController::class);
// Route::get('/coffee', [BookController::class, "coffee"]);
// Route::get("/get/{id}", [BookController::class, 'get']);
// Route::get('/contact/{id}', function(Contact $contact) {
//     // $contact = Contact::findOrFail($id);
//     return $contact;
// });