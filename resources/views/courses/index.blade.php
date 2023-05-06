@extends("layouts.master")


@section('title')
    Courses
@endsection

@section('content')

<h4>
    Add a new course
</h4>
<form action="{{ route('courses.store') }}" method="post">
    @csrf

        <div class="input-group mt-4 p-2 w-50">
            <input type="text"
            name="name"
            class=" form-control">
            <button class=" btn btn-primary">
                ADD
            </button>
        </div>
</form>
    
@endsection