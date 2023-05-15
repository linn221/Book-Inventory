@extends("layouts.master")

@section("title")
    Purchase Records
@endsection

@section("content")

@if (session('status'))
    <div class=" alert alert-success">
        {{ session('status') }}
    </div>
@endif
    
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
            <td>
                Control
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
                {{ $student->course->name }}
            </td>
            <td>
                {{-- yellow --}}
                3,000
            </td>
            <td>
                {{ $student->paid }}
            </td>
            <td>
                {{ $student->purchases->count() }}
            </td>
            <td>
                <a href="{{ route('student.edit', $student->id) }}" class=" btn btn-sm btn-warning">
                    Edit
                </a>
                <a href="{{ route('student.show', $student->id) }}" class=" btn btn-sm btn-primary">
                    Details
                </a>
                <form action="{{ route('student.destroy', $student->id) }}" method="post" class=" d-inline-block">
                    @csrf
                    @method('delete')
                    <button class=" btn btn-sm btn-danger">
                        Delete
                    </button>
                </form>
            </td>

        </tr>
        @empty
            
        @endforelse

    </tbody>
</table>
@endsection