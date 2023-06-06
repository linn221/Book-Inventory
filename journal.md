### 2023-04-30 Sun 05:17 PM
* **treat each course as a separate model** and show them in books.create as *datalists*

### 2023-05-01 Mon 02:30 PM

### 2023-05-04 Thu 09:14 PM
- [x] show detail page for each book
- [x] CRUD basic

### 2023-05-05 Fri
- [x] default value in form
- [x] action status alert using session
- [x] update/store button to the right

### 2023-05-06 Sat
- [x] validate the requests, make the name unique
- [x] repopulate forms with old values
- [x] show errors in forms bootstrap style
- [x] nav-bar
- [x] make course model

### 2023-05-07 Sun
- [x] CRUD for courses, two page for all actions
- [x] Edit details page, with notes filed

### 2023-05-08 Mon
:warning: convert course column of books to a foreign key of course table (later of course)

- [x] make each course a radio button, provide a link to create a new one
- [x] style courses page, currently the table is fucked, (add note column as well)
    <br>
    handle empty data as well, makes input autofocus

- [x] show alert status on updating (turns out *i forgot the key for session, first argumet to session() helper*)

### 2023-05-09 Tue
- [x] add link for creating a course at the end of radio button
- [x] update Validator for course attribute, the value has to be in courses table
- [x] search book name

### 2023-05-10 Wed
- [x] modify books table to store course_id as a foreign key instead of course string
- [x] join table for listing books data of course
- [x] book.edit form, choose the previously selected course by default
- [x] sort by column function in book.index
- [x] book.create as well, use old() helper

### 2023-05-11 Thu
- [x] toggle ascending and descending (used session)
- [x] validate course basic, unique name, with limited character length

### 2023-05-13 Sat
- [x] create form for purchase

### 2023-05-14 Sun
- [x] Student model, migration, controller
- [x] Purchase model, migration, controller
- [x] implement purchase.store
- [x] list purchases
- [x] show purchase
- [x] status alert

### 2023-05-14 Sun
- [x] eloquent relationships: `$student->books`, `$student->course->name`

### 2023-05-14 Sun
- [ ] update seeder and fix created/updated_at column having NULL values
- [ ] update the seeder using an eloquent factory, fixing the first issue as side effect

### 2023-05-20 Sat
*i don'nt know what is happening with my time line, might update it after reading the commits but wtf.*
- [x] calculate total purchase `$student->total`    \
    *create a method for getting the sum of books's price whose ids are in the argument array*\
    *solved proudly by using an accessor method*
- [x] display paid columns as checkbox, but keeps yes|no value on details

### 2023-05-21 Sun
- [x] add javascript to create form
- [x] zero total price in selecting a different course, uncheck checkboxes as well

### 2023-05-28 Sun
- [x] write javascript code in a separate file, create functions.js

### 2023-05-29 Mon
- [x] implement javascript in edit form\
display only related books\
dynamic total price (including reseting the value at selecting a different course)
- [x] inline javascript for selecting the course, chosen books and total bill (make it global)
- [x] edit purchase, select chosen books and course on start
- [x] disable autofocus on student edit form

### 2023-05-30 Tue
- [x] finish update student
- [x] CRUD purchase

### 2023-05-31 Wed
- [x] validation for create form

### 2023-06-05 Mon
- [!] add validation rules on update student request
- [!] roll no could be same on updating student
- [!] repopulating old values on create form, course_id, selected books, paid checkbox
- [ ] show error messages on invalid course_id or books
- [!] validation on request's books array
- [ ] validation on update student, don't allow an existing student name or roll no
- [ ] display total price with commas
- [ ] sort by id, name, paid

## Refactoring
- [x] course table's name column have to be unique
- [x] change courses to singular route name
- [x] use stack instead of js section
- [!] move js function to a separate file, src by using a helper
- [!] total price to total bill to old code, total bill makes more sense
- [!] refactor old code that treat paid attribute as yes/no string instead of boolean
- [ ] update students table migration string count
- [ ] course_to_books should be like a static eloquent method
- [ ] update paid column to bit type, and use casting on model

## UI
- [x] show book price in student.show details page
- [ ] replace text buttons with icons
- [ ] transform select element to radio button to save some time

## Bugs
- [x] in course form, one additional tab has 
- [x] course listing table become inline after first item
- [x] details page, course has been an array instead of just the name
- [!] source code leaks on creating a new book form: => "document.getElementById("").checked = true; endpush "



## Random Thoughts
- show ins and outs of stock (+5 or -1 at the stock column)
- [ ] create course link should persist the existing form data, then redirect back to the create book form, how? this is some serious stuffs, not beginner friendly so im keeping here
- [ ] warn me when deleting something that will delete related data from a different table
- [ ] make the course clickable link, which filter the list of books by that id
- [ ] sort the purchase records by total_bill
- [!] extension for suggestions of eloquent method
- [x] want to separate javascript code and blade syntax
- [ ] 
