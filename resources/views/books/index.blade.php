@extends('layouts.master')

@section('title')
    Book List
@endsection

@section('content')
    <h4>Book List</h4>

    <table class=" table">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Course</td>
                <td>Price</td>
                <td>Stock</td>
                <td>Control</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>
                        {{ $book->id }}
                    </td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->course }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route("book.show", $book->id) }}" class=" btn btn-success">
                            Details
                        </a>
                        <a href="{{ route('book.edit', $book->id) }}" class=" btn btn-primary">
                            Edit
                        </a>
                        <form method="post" action="{{ route('book.destroy', $book->id) }}" class=" d-inline-block">
                            @csrf
                            @method('delete')
                            <button class=" btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
            @endforeach
        </tbody>
    </table>
@endsection
