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
                    <td> <a href="{{ route('inventory.show', $book->id) }}"> {{ $book->id }}
                        </a></td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->course }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        Control
                    </td>
            @endforeach
        </tbody>
    </table>
@endsection
