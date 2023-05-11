@extends('layouts.master')

@section('title')
    Edit Course
@endsection

@section('content')

<h4>
    Edit Course
</h4>

{{-- update form, proudly copy & paste from courses.index --}}
<form action="{{ route('course.update', $course->id) }}" method="post">
    @csrf
    @method('put')
    <div class="mt-4 p-2 w-50">
        <input type="text"
        name="name"
        placeholder="Course Name"
        value="{{ $course->name }}"
        class=" form-control w-75 mb-3">

        <label for="" class=" form-label">
            Notes
        </label>

        <textarea name="note" class=" form-control w-75 mb-3">{{ $course->note }}</textarea>
        <button class=" btn btn-primary">
            UPDATE
        </button>
    </div>
</form>

@endsection