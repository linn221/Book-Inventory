MAIN();
function MAIN()
{

    // global objects
    // window.books = @json($books);
    // window.course_to_books_id = @json($course_to_books);

    // showing books related to course selected by default
    console.log(books);
    let course_select_elm = document.querySelector("#course");
    show_books(course_to_books_id[course_select_elm.value], false);
    update_total_price();

    // listening for event of user selecting a course
    course_select_elm.addEventListener('change', function (event) {
        let selected_course_id = event.target.value;
        let books_id_to_show = course_to_books_id[selected_course_id];
        show_books(books_id_to_show);
    });

    // adding listeners for event of selecting a book
    let book_boxes = document.querySelectorAll('input[name="books[]"]');
    for (let book_box of book_boxes) {
        book_box.addEventListener('change', function (event) {
            update_total_price();
        })
    }
}

function show_books(books_id, clear_state=true) {
    // show books, takes array of books' id to show

    let all_books_div = document.querySelectorAll('.book-div');
    // hide all books
    for (let book_div of all_books_div) {
        book_div.style.display = 'None';
    }

    // uncheck all boxes to start from zero
    if (clear_state) {
        let checked_boxes = document.querySelectorAll('input[name="books[]"]:checked');
        for (let box of checked_boxes) {
            box.checked = false;
        }
    }

    // show books with the given ids
    for (let book_id of books_id) {
        let book_div = document.querySelector("#book-" + book_id);
        book_div.style.display = 'block';
    }
}

function update_total_price()
{
    let total_price = 0;

    let selected_books = document.querySelectorAll('input[name="books[]"]:checked');
    for(let selected_book of selected_books) {
        let selected_book_id = selected_book.value;
        let selected_book_price = get_book_price(selected_book_id);
        total_price += selected_book_price;
    }
    let total_price_span = document.querySelector('#total_price');
    total_price_span.textContent = total_price;
}

function get_book_price(book_id)
{
    let book_object = books.filter(function(o) {
        return o.id == book_id;
    });
    return book_object[0].price;
}