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
- [!] show purchase
- [!] edit purchase
- [!] CRUD purchase
- [ ] validation
- [ ] repopulating
- [ ] status alert
- [ ] calculate total purchase `$student->total`
- [ ] eloquent relationships: `$student->books`, `$student->course->name`

### Refactoring
- [x] course table's name column have to be unique
- [x] change courses to singular route name

### Bugs
- [x] in course form, one additional tab has 
- [x] course listing table become inline after first item
- [x] details page, course has been an array instead of just the name



### Random Thoughts
- show ins and outs of stock (+5 or -1 at the stock column)
- [ ] create course link should persist the existing form data, then redirect back to the create book form, how? this is some serious stuffs, not beginner friendly so im keeping here
- [ ] warn me when deleting something that will delete related data from a different table
- [ ] make the course clickable link, which filter the list of books by that id
- [ ] 