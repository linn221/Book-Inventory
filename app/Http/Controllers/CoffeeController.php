<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $books = Book::all();
        return $books->toJson();
    }



// old testing code, want to leave it here cuz that's cool
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

// Route::post();
// Route::get('/coffee', [BookController::class, "coffee"]);
// Route::get("/get/{id}", [BookController::class, 'get']);
// Route::get('/contact/{id}', function(Contact $contact) {
//     // $contact = Contact::findOrFail($id);
//     return $contact;
// });
        //
}
