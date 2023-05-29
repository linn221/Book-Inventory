MAIN();

function show_books(books_id) {
    // show books, takes array of books' id to show

    let all_books_div = document.querySelectorAll('.book-div');
    // hide all books
    for (let book_div of all_books_div) {
        book_div.style.display = 'None';
    }

    // uncheck all boxes to start from zero
    let checked_boxes = document.querySelectorAll('input[name="books[]"]:checked');
    for (let box of checked_boxes) {
        box.checked = false;
    }
    // zero total price
    let total_price_span = document.querySelector('#total_price');
    total_price_span.textContent = 0;

    // show books with the given ids
    for (let book_id of books_id) {
        let book_div = document.querySelector("#book-" + book_id);
        book_div.style.display = 'block';
    }
}

function MAIN()
{
    // global objects
    // window.books = @json($books);
    // window.course_to_books_id = @json($course_to_books);

    // showing books related to course selected on start up
    let course_select_elm = document.querySelector("#course");
    course_select_elm.value = window.course;
    show_books(course_to_books_id[course_select_elm.value]);

    // listening for event of user selecting a course
    course_select_elm.addEventListener('change', function (event) {
        let selected_course_id = event.target.value;
        let books_id_to_show = course_to_books_id[selected_course_id];
        show_books(books_id_to_show);
    });

    // getting dynamic total price to work
    let book_boxes = document.querySelectorAll('input[name="books[]"]');
    let total_price_span = document.querySelector('#total_price');
    total_price_span.textContent = window.total_bill;
    // selecting already chosen books
    for(let book_id of window.selected_books) {
        let book_box_elm = document.getElementById(book_id);
        book_box_elm.checked = true;
    }
    for (let book_box of book_boxes) {
        book_box.addEventListener('change', function (event) {
            let checked = event.target.checked;
            let book_id = event.target.id;
            // get the checkbox book's price
            let selected_price = books.find(function (book) {
                return book.id == book_id;
            }).price;

            let origin_total_price = parseInt(total_price_span.textContent);
            console.log(origin_total_price);
            if (checked) {
                total_price_span.textContent = origin_total_price + selected_price;
            } else {
                total_price_span.textContent = origin_total_price - selected_price;
            }
        })
    }
}
