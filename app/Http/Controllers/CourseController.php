<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index() {
        $courses = Course::all();
        return view("courses.index", [
            'courses' => $courses
        ]);
    }

    public function store(Request $request) {
        // yellow, any chance to pass the attribute in constructor directly?
        // using validate method bcoz im cool

        $request->validate([
            'name' => "required|min:2|max:20|unique:courses,name",
            'note' => "present"
        ]);

        $course = new Course();
        $course->name = $request->input('name');
        $course->note = $request->input('note');
        $course->save();
        return redirect()->back()->with(['status' => "$course->name saved at id #$course->id"]);
    }

    public function edit(Course $course) {
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    public function update(Course $course, Request $request) {
        $request->validate([
            'name' => "required|min:2|max:20|unique:courses,name,$course->id",
            'note' => "present"
        ]);
        $course->name = $request->name;
        $course->note = $request->note;
        $course->update();
        return redirect()->route('course.index')->with("status", "Id#$course->id ($course->name) has been updated successfully");
    }

    public function destroy(Course $course) {
        // validate the request pls
        $status = "#$course->id ($course->name) successfully deleted!";
        $course->delete();
        return redirect()->back()->with([ 'status' => $status ]);
    }
}
