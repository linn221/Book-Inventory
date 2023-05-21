import './bootstrap';


let course_and_books = {"7":[1,4,8,18],"3":[2,6,14],"2":[3,7],"4":[5,9],"6":[10,11,12,15,17],"1":[13,16,19]};
let course_select = document.querySelector("#course");
course_select.style.display = 'None';
let checkboxes = document.querySelectorAll("input[type='checkbox']");
console.log(checkboxes);
course_select.addEventListener('change', function(event) {
    let books_id_to_show = course_and_books[event.target.value];
    alert(books_id_to_show);
    // make the books visible
});
    