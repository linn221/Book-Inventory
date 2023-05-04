@extends('layouts.master')

@section('title')
    Edit Book
@endsection

@section('content')

    <h4>
        Edit New Book
    </h4>

    <form action="{{ route("book.update", $book->id) }}" method="post">
        @csrf
        @method("put")

        <div class="mb-3">
            <label for="" class=" form-label">
                Name
            </label>
            <input
            type="text"
            name="name"
            value="{{ $book->name }}"
            class=" form-control">
        </div>
        <div class="mb-3">
            <label for="" class=" form-label">
                Price
            </label>
            <input
            type="number"
            name="price"
            value="{{ $book->price }}"
            step="50"
            class=" form-control">
        </div>
        <div class="mb-3">
            <label for="" class=" form-label">
                Course
            </label>
            {{-- yellow, turn me into datalist --}}
            <input
            type="text"
            name="course"
            value="{{ $book->course }}"
            class=" form-control">
        </div>
        <div class="mb-3">
            <label for="" class=" form-label">
                Stock
            </label>
            <input
            type="number"
            name="stock"
            value="{{ $book->stock }}"
            class=" form-control">
        </div>
        <div class="mb-3">
            <label for="" class=" form-label">
                Minimum Stock
            </label>
            <input
            type="number"
            name="minStock"
            value="{{ $book->minStock }}"
            class=" form-control">
        </div>
        <button class=" btn btn-primary">
            Update
        </button>
    </form>
@endsection