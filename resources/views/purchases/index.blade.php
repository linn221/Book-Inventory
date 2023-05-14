@extends("layouts.master")

@section("title")
    Purchase Records
@endsection

@section("content")
<h4>
    Purchase Records
</h4>

<table class=" table">
    <thead>
        <tr>
            <td>
                #
            </td>
            <td>
                Name
            </td>
            <td>
                Roll No
            </td>
            <td>
                Course
            </td>
            <td>
                Total
            </td>
            <td>
                Paid
            </td>
            <td>
                Books
            </td>

        </tr>
    </thead>
    <tbody>
        <tr>

            @forelse ($students as $student)
            <td>
                {{ $student->id }}
            </td>
            <td>
                {{ $student->name }}
            </td>
            <td>
                {{ $student->roll_no }}
            </td>
            <td>
                {{-- yellow --}}
                {{ $student->course_id }}
            </td>
            <td>
                {{-- yellow --}}
                3,000
            </td>
            <td>
                {{ $student->paid }}
            </td>
            <td>
                {{-- yellow --}}
                Books
            </td>

        </tr>
        @empty
            
        @endforelse

    </tbody>
</table>
@endsection