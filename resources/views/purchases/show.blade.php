@extends('layouts.master')

@section('title')
    Purchase Detail
@endsection

@section('content')
    <h4>Purchase Detail</h4>

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
                {{ $student->paid }}
            </td>
        </tr>
        <tr>
            <td>Books</td>
            <td>
                <ul>
                    @foreach ($student->purchases as $purchase)
                    <li>
                        {{ $purchase->book->name }}
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
