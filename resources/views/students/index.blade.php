@extends("layouts.master")

@section("title")
    Student Records
@endsection

@section("content")

@if (session('status'))
    <div class=" alert alert-success">
        {{ session('status') }}
    </div>
@endif
    
<h4>
    Student Records
</h4>
<div class="row justify-content-between mb-3">
    <div class="col-md-3">
        <a href="{{ route('student.create') }}" class="btn btn-outline-primary">Create</a>
    </div>
    <div class="col-md-5">
        <form method="get">
            <div class=" input-group ">
                <input type="text" class=" form-control" name="q">
                <button class=" btn btn-primary">Search</button>
            </div>
        </form>
    </div>
</div>
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
                {{ number_format($student->total_bill); }}
            </td>
            <td>
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