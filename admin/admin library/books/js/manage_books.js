// Edit Operation 
// Grabbing edit buttons of all books
let editButtons = document.getElementsByClassName('edit-btn');


// For edit Modal 
let bookNameField = document.getElementById('editBook_name');
let editBookId = document.getElementById('editBook_id'); // hidden input

// Iterating through all the editButtons 
Array.from(editButtons).forEach(editButton => {
    // Some event that happen after clicking edit button
    editButton.addEventListener('click', () => {
        // Note: Modal gets Opened after editButton is clicked
        // Putting the existing value of targeted book record in the modal field :
        let bookRecord = editButton.parentElement.parentElement; // <tr> tag of Book on which edit button is clicked

        /* Sample:
        <tr>
            <td class="book-info">1</td>
            <td class="book-info">Book Name</td>
            <td class="book-info">ISBN Number</td>
            <td class="book-info">Book Edition</td>
            <td class="book-info">Book Status</td>
            <td class="book-info">Quantity</td>
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editBook">
                    <i class="bi bi-pencil-square"></i>
                    <span class="d-none d-sm-inline">Edit</span>
                </button>
                <button type="button" class="btn btn-sm btn-danger">
                    <i class="bi bi-pencil-square"></i>
                    <span class="d-none d-sm-inline">Delete</span>
                </button>
            </td>
        </tr>
        */

        // Grabbing values from the row of table where edit button is clicked 
        let bookInformation = bookRecord.getElementsByClassName('book-info');
        let bookId = bookInformation[0];
        let bookName = bookInformation[1];
        let bookIsbnNumber = bookInformation[2];
        let bookAuthor = bookInformation[3];

        // Putting values in field in modal 
        editBookId.value = bookId.innerText; // hidden input
        bookNameField.value = bookName.innerText;

    })
})


// Delete Operation 
// Grabbing delete buttons of all Categories
let deleteButtons = document.getElementsByClassName('delete-btn');

// For delete Modal 
let deleteBookId = document.getElementById('deleteBook_id'); // hidden input


// Iterating through all the editButtons 
Array.from(deleteButtons).forEach(deleteButton => {
    // Some event that happen after clicking delete button
    deleteButton.addEventListener('click', () => {
        // Note: Modal gets Opened after deleteButton is clicked

        // Trying to grab the book_id for sending through POST request:
        let bookRecord = deleteButton.parentElement.parentElement; // <tr> tag of Book on which delete button is clicked

        let bookId = bookRecord.getElementsByClassName('book-info')[0];
        deleteBookId.value = bookId.innerText; // hidden input
    })
})
