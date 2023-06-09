<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Course;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // validation for search & order parameter is required! yellow
        $search = '';
        $books = Book::
        when($request->has('search'), function($q) {
            $search = request()->input('search');

            $q->where('name', 'LIKE', "%$search%");
        })
        ->when($request->has('order'), function($q) use ($request) {

            // using session for toggling ascend and descend
            $sort = $request->session()->get('sort', 'asc');
            $sort_toggled = $sort === 'asc' ? 'desc' : 'asc';
            $request->session()->put('sort', $sort_toggled);
            $order_column = request()->input('order');

            $q->orderBy($order_column, $sort);
        })
        ->get();
        // if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $books = Book::where('name', 'LIKE', "%$search%")->get();
        // } else {
        //     $search = '';
        //     $books = Book::all();
        // }

        return view("books.index", compact('search', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view("books.create", [
            'courses' => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
        $book = Book::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'minStock' => $request->minStock,
            'course_id' => $request->course_id
        ]);
        return redirect()->route("book.index")->with("status", "Book#$book->id successfully created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return view("books.show", [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view("books.edit", [
            'book' => $book,
            'courses' => Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->name = $request->name;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->minStock = $request->minStock;
        $book->course_id = $request->course_id;
        $book->update();
        return redirect()->route("book.index")->with("status", "Book#$book->id successfully updated");
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route("book.index")->with("status", "Book#$book->id deleted successfully");
        //
    }

    public function coffee() {
        $books = Book::where("price", ">", 100)->dd();
        return $books;
    }

    public function get(Book $ids) {
        return $ids;
    }
}
