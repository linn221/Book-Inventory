@extends("layouts.master")
@section('title')
    Testing Space
@endsection

@section('content')
    <h4>
        Coffee!
    </h4>
@endsection

@section('js')
<script>
let course_to_books = @json($course_to_books);
let all_books_id = @json($all_books_id);
console.log(course_to_books);
console.log(all_books_id);

</script>
@endsection