@extends("layouts.master")

@section('title')
    Add a new purchase
@endsection

@section('content')
    <h4>
        Add purchase
    </h4>

    <form action="{{ route('student.store') }}" method="post">
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
            <span class=" text-success">
                3,000
            </span>
            <input type="checkbox" name="paid" id="paid"
            class=" ms-3 form-check-input">
            <label for="paid" class=" form-check-label">
                Paid
            </label>
        </div>

        <button class=" btn btn-primary">
            submit
        </button>
    </form>
    
@endsection

@section('js')
<script>
    // okay, this javascript task has overwhelmed my brain. i am considering learning typescript

    // let course_to_books = {"7":[1,4,8,18],"3":[2,6,14],"2":[3,7],"4":[5,9],"6":[10,11,12,15,17],"1":[13,16,19]};
    // object, each course id named property has an array of related book ids
    let course_to_books_id = @json($course_to_books);

    let course_select_elm = document.querySelector("#course");
    let all_books_div = document.querySelectorAll('.book-div');
    // showing books related to course selected by default
    show_books(course_to_books_id[course_select_elm.value])
    
    // listening for event of user selecting a course
    course_select_elm.addEventListener('change', function(event) {
        let selected_course_id = event.target.value;
        let books_id_to_show = course_to_books_id[selected_course_id];
        show_books(books_id_to_show);
    });
    
    function show_books(books_id) {
        // show books, takes array of books' id to show

        // hide all books
        for(book_div of all_books_div) {
            book_div.style.display = 'None';
        }

        // show books with the given ids
        for(book_id of books_id) {
            let book_div = document.querySelector("#book-" + book_id);
            book_div.style.display = 'block';
        }
    }

    // let books_id = document.querySelectorAll('input[type="checkbox"]');
</script>
@endsection