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
        $students = Student::latest('id')->get();
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
        $course_to_books = []; // an associated array with each course id as key and its related book ids as values
        // this wild code because i am confused with which collection method to use
        // refactor.me
        foreach($books as $book) {
            $course_to_books[$book->course_id][] = $book->id;
        }
        return view("purchases.create", compact('courses', 'books', 'course_to_books'));
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
        $course_to_books = []; // an associated array with each course id as key and its related book ids as values
        // this wild code because i am confused with which collection method to use
        // refactor.me
        foreach($books as $book) {
            $course_to_books[$book->course_id][] = $book->id;
        }
        return view("purchases.edit", compact('student', 'courses', 'books', 'course_to_books'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        // update student data
        $student->name = $request->input('name');
        $student->roll_no = $request->input('roll_no');
        $student->paid = $request->has('paid') ? 'yes' : 'no';
        $student->course_id = $request->input('course');
        $student->save();

        // record the purchases
        $chosen_books = $request->input('books');
        // removing existing records if it is unselected, neat?
        Purchase::query()->where('student_id', $student->id)->whereNotIn('book_id', $chosen_books)->delete();
        // adding records for selected items
        foreach($chosen_books as $book_id) {
            Purchase::firstOrCreate(['student_id' => $student->id, 'book_id' => $book_id]);
        }
        $status = "Updated student#$student->id";

        return redirect()->route('student.index')->with('status', $status);
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
