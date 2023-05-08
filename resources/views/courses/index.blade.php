@extends("layouts.master")


@section('title')
    Courses
@endsection

@section('content')

<h4>
    Add a new course
</h4>

{{-- proudly copy & paste from books.index --}}
@if (session('status'))
    <div class=" alert alert-success">
        {{ session('status') }}
    </div>
@endif

{{-- create form --}}
<form action="{{ route('courses.store') }}" method="post">
    @csrf
    <div class="mt-4 p-2 w-50">
        <input type="text"
        name="name"
        placeholder="Course Name"
        class=" form-control w-75 mb-3">
        <label for="" class=" form-label"> Notes </label>
        <textarea name="note" class=" form-control w-75 mb-3"></textarea>
        <button class=" btn btn-primary">
            ADD
        </button>
    </div>
</form>

{{-- listing existing data --}}

<table class=" table">
    <thead>
        <tr>
            <td>#</td>
            <td>Course</td>
            <td>Notes</td>
            <td>Control</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->note }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->id) }}" class=" btn btn-outline-warning">
                        Edit
                    </a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="post" class=" d-inline-block">
                        @csrf
                        @method('delete')
                        <button class=" btn btn-danger">
                            Del
                        </button>
                    </form>
                </td>
            </tr>
        
        @empty
            
        @endforelse
    </tbody>
    
@endsection
</table>