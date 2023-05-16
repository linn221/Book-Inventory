<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Book;
use App\Models\Course;
use App\Models\Purchase;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('purchases.index', compact('students'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //
        $courses = Course::all();
        $books = Book::all();
        return view("purchases.create", compact('courses', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //

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
        $status = "Student#$student->id has purchased " . count($books) . " books.";
        return redirect()->route("student.index")->with("status", $status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return view('purchases.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        $books = Book::all();
        return view("purchases.edit", compact('student', 'courses', 'books'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $status = "Deleted student#$student->id";
        $student->delete();
        return redirect()->route('student.index')->with('status', $status);
        //
    }
}
