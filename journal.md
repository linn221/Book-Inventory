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

- [ ] book.edit form, choose the previously selected course by default
- [ ] add link for creating a course at the end of radio button
- [ ] update Validator for course attribute

- [ ] change courses to singular route name
- [ ] validate course basic, unique name, with limited character length
- [ ] sort by column function in book.index
- [ ] create the course if it doesn't exist, then add the id to book table
- [ ] make the course clickable link, which filter the list of books by that id

### Refactoring
- [ ] course table's name column have to be unique

### Bugs
- [ ] in course form, one additional tab has 



### Random Thoughts
- show ins and outs of stock (+5 or -1 at the stock column)
- [ ] 