@extends('layouts.master')

@section('title')
    Book Detail
@endsection

@section('content')
    <h4>Book Detail</h4>

    <table class=" table">
        <tr>
            <td>Name</td>
            <td>{{ $book->name }}</td>
        </tr>
        <tr>
            <td>Course</td>
            <td>{{ $book->name }}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>{{ $book->price }}</td>
        </tr>
        <tr>
            <td>Stock</td>
            <td>{{ $book->stock }}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td>{{ $book->created_at }}</td>
        </tr>
        <tr>
            <td>Updated At</td>
            <td>{{ $book->updated_at }}</td>
        </tr>
    </table>
@endsection
