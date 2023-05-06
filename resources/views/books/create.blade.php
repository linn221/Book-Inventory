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
            value=""
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
            value="50"
            step="50"
            class=" form-control @error("price") is-invalid @enderror">

            @error('price')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="" class=" form-label">
                Course
            </label>
            {{-- yellow, turn me into datalist --}}
            <input type="text"
            name="course"
            value=""
            class=" form-control @error("course") is-invalid @enderror">

            @error('course')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="" class=" form-label">
                Stock
            </label>
            <input
            type="number" 
            name="stock" 
            value="3"
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
            value="1"
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
