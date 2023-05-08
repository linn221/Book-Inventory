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
            class=" form-control @error("name") is-invalid @enderror">

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
                    <input class="form-check-input" type="radio" name="course" value="{{ $course->id }}">
                    <label class="form-check-label" for="inlineRadio1">{{ $course->name }}</label>
                </div>
            @empty
                Create a fucking course
            @endforelse

            {{-- i don't think i am needing this but leaving it here anyways --}}
            {{-- @error('course')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror --}}
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
