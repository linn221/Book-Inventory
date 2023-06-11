@extends("layouts.master")

@section('title')
    Edit Student
@endsection

@section('content')
    <h4>
        Edit Student
    </h4>

    <form action="{{ route('student.update', $student->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="" class=" form-label">
                Name
            </label>
            <input
            type="text"
            name="name"
            value="{{ old('name', $student->name) }}"
            class=" form-control @error("name") is-invalid @enderror">

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
            value="{{ old('roll_no', $student->roll_no) }}"
            class=" form-control @error("roll_no") is-invalid @enderror">

            @error('roll_no')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class=" form-label">
                Course
            </label>

            <select name="course" id="course" class=" form-select mb-3">
                @forelse ($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @empty
                    
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <fieldset class="">
                <legend>Books</legend>

                <div class="row">
                    @forelse ($books as $book)
                    <div class=" col-6 book-div" id="book-{{ $book->id }}">

                        <input type="checkbox"
                            name="books[]"
                            id="{{ $book->id }}"
                            value="{{ $book->id }}"
                            class=" form-check-input">
                        <label for="{{ $book->id }}" class=" form-check-label">
                            {{ $book->name }} ({{ $book->price }} MMK)
                        </label>
                    </div>
                    @empty

                    @endforelse
                </div>
            </fieldset>
        </div>

        <div class=" mb-3">
            Total Price:
            <span class=" text-success" id="total_price">
                3,000
            </span>
            <input type="checkbox" name="paid" id="paid"
            class=" ms-3 form-check-input" {{ $student->paid == 'yes' ? 'checked' : '' }}>
            <label for="paid" class=" form-check-label"">
                Paid
            </label>
        </div>

        <button class=" btn btn-primary">
            submit
        </button>
    </form>
    
@endsection

@push('js')
    window.books = @json($books);
    window.course_to_books_id = @json($course_to_books);
    {{-- echoing for now since i don't need quotes, maybe yellow --}}
    window.course = @json($student->course->id);
    window.selected_books = @json($student->books_id);
    window.total_bill = {{ $student->total_bill }};
@endpush
@vite('resources/js/edit_purchase.js')