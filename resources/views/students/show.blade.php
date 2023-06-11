@extends('layouts.master')

@section('title')
    Student Detail
@endsection

@section('content')
    <h4>Student Detail</h4>

    <table class=" table">
        <tr>
            <td>Name</td>
            <td>{{ $student->name }}</td>
        </tr>
        <tr>
            <td>Roll no:</td>
            <td>{{ $student->roll_no }}</td>
        </tr>
        <tr>
            <td>Course</td>
            <td>{{ $student->course->name }}</td>
        </tr>
        <tr>
            <td>Total price</td>
            <td>
                {{ number_format($student->total_bill); }}
            </td>
        </tr>
        <tr>
            <td>Paid</td>
            <td>
                {{-- <input type="checkbox" name="" id="" {{ $student->paid ? 'checked' : '' }}> --}}
                @if ($student->paid)
                    <span class=" h4 text-success">
                        &#x2611;
                    </span> 
                @else
                    <span class=" h4 text-danger">
                        &#x2612;
                    </span> 
                @endif
                {{-- {{ $student->paid }} --}}
            </td>
        </tr>
        <tr>
            <td>Books</td>
            <td>
                <ul>
                    @foreach ($student->purchases as $purchase)
                    <li class="mb-1">
                        {{ $purchase->book->name }}
                        <span class=" text-bg-success p-1 rounded-2">
                            {{ $purchase->book->price }}
                        </span>
                    </li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td>Created At</td>
            <td>{{ $student->created_at }}</td>
        </tr>
        <tr>
            <td>Updated At</td>
            <td>{{ $student->updated_at }}</td>
        </tr>
    </table>
@endsection
