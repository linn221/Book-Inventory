<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Course;
use App\Models\Purchase;
use App\Models\Student;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses = Course::all();
        $books = Course::all();
        return view("purchases.create", compact('courses', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        // return $request->all();

        // save student
        $student = new Student;
        $student->name = $request->name;
        $student->roll_no = $request->roll_no;
        $student->course_id = $request->course;
        $student->paid = $request->has('paid') ? 'yes' : 'no';
        $student->save();

        // record the purchases
        $books = $request->books;
        foreach($books as $book_id) {
            Purchase::create([
                'student_id' => $student->id,
                'book_id' => $book_id
            ]);
        }
        return redirect()->back();
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
