@extends('layouts.master')

@section('title')
    Create Book
@endsection

@section('content')
    <h4>
        Create New Book
    </h4>

    @if ($errors->any())
        <div class=" alert alert-danger">
            Fill the form correctly
        </div>
    @endif

    <form action="{{ route('book.store') }}" method="post">
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
                Price
            </label>
            <input
            type="number"
            name="price"
            value="{{ old("price", "50") }}"
            step="50"
            class=" form-control @error("price") is-invalid @enderror">

            @error('price')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            @forelse ($courses as $course)
                <div class="form-check form-check-inline">
                    {{-- yellow, i am supposed to store just the id, but see, i don't want to focus too much on things like foreign keys and stuffs, so leaving it here
                    {{-- this is just a learning project and I am already over thinking stuffs --}}
                    {{-- <input class="form-check-input" type="radio" name="course" value="{{ $course->id }}"> --}}
                    <input
                    type="radio"
                    name="course_id"
                    class="form-check-input"
                    id="{{ 'r'.$course->id }}"
                    value="{{ $course->id }}">
                    <label class="form-check-label" for="{{ 'r'.$course->id }}">{{ $course->name }}</label>
                </div>
            @empty
                Create a fucking course
            @endforelse
            <a href="{{ route('courses.index') }}" class=" btn btn-sm btn-primary ms-3">
                Create Course
            </a>

            @error('course')
            <h5>
                <div class=" text-danger">
                    {{ "!!! $message !!!" }}
                </div>
            </h5>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class=" form-label">
                Stock
            </label>
            <input
            type="number" 
            name="stock" 
            value="{{ old("stock", 3) }}"
            class=" form-control @error("stock") is-invalid @enderror">

            @error('stock')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="" class=" form-label">
                Minimum Stock
            </label>
            <input
            type="number"
            name="minStock"
            value="{{ old('minStock', 1) }}"
            class=" form-control @error("minStock") is-invalid @enderror">

            @error('minStock')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class=" d-flex justify-content-end">
            <button class=" btn btn-primary">
                Store
            </button>
        </div>
    </form>
@endsection
