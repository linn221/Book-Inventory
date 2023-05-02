<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view("books.index", [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("books.create");
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
            'course' => $request->course
        ]);
        return redirect()->route("inventory.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $book = Book::findOrFail($id);
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
        return "This is edit page for inventory";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }

    public function coffee() {
        $books = Book::where("price", ">", 100)->dd();
        return $books;
    }
}
