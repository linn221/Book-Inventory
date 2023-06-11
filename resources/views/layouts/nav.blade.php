<aside>

    <div class=" list-group">
        <a href="{{ route("index") }}" class=" list-group-item list-group-item-action">
            Home
        </a>
    </div>

    {{-- <p class="mt-3 my-2">Manage Category</p>

    <div class=" list-group">
        <a href="{{ route("coffee") }}" class=" list-group-item list-group-item-action">
            Create Category
        </a>
        <a href="{{ route("coffee") }}" class=" list-group-item list-group-item-action">
            Category List
        </a>
    </div> --}}
    <p class="mt-3 my-2">Manage Students</p>

    <div class=" list-group">
        <a href="{{ route("student.create") }}" class=" list-group-item list-group-item-action">
            New Student
        </a>
        <a href="{{ route("student.index") }}" class=" list-group-item list-group-item-action">
            Records
        </a>
    </div>


    <p class="mt-3 my-2">Manage Inventory</p>

    <div class=" list-group">
        <a href="{{ route("book.create") }}" class=" list-group-item list-group-item-action">
            Create New
        </a>
        <a href="{{ route("book.index") }}" class=" list-group-item list-group-item-action">
            Stock Tour
        </a>
        <a href="{{ route("course.index") }}" class=" list-group-item list-group-item-action">
            Courses
        </a>
    </div>

    <div class=" list-group">
        <a href="{{ route("coffee") }}" class=" list-group-item list-group-item-action text-success">
            Coffee
        </a>
    </div>

</aside>
