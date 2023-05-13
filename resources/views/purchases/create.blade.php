@extends("layouts.master")

@section('title')
    Add a new purchase
@endsection

@section('content')
    <h4>
        Add purchase
    </h4>

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class=" form-label">
                Name
            </label>
            <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            class=" form-control @error("name") is-invalid @enderror"
            autofocus>

            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class=" form-label">
                Roll No:
            </label>
            <input
            type="text"
            name="roll_no"
            value="{{ old('roll_no') }}"
            class=" form-control @error("roll_no") is-invalid @enderror"
            autofocus>

            @error('roll_no')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class=" form-label">
                Course
            </label>

            <select name="course" id="" class=" form-select mb-3">
                @forelse ($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @empty
                    
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <fieldset>
                <legend>Books</legend>

                @forelse ($books as $book)
                    <input type="checkbox"
                    name="books[]"
                    id="{{ $book->id }}"
                    value="{{ $book->id }}"
                    class=" form-check-input">
                    <label for="{{ $book->id }}"
                        class=" form-check-label">
                        {{ $book->name }} ({{ $book->price }} MMK)
                    </label>
                    <br>
                @empty

                @endforelse
            </fieldset>
        </div>

        <button class=" btn btn-primary">
            submit
        </button>
    </form>
    
@endsection