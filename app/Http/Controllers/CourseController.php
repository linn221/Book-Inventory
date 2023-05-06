<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index() {
        return view("courses.index");
    }

    public function store(Request $request) {
        return 'courses.store';

    }

    public function update(Request $request) {

    }

    public function destroy(Request $request) {

    }
}
