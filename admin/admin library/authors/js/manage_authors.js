// Edit Operation 
// Grabbing edit buttons of all authors
let editButtons = document.getElementsByClassName('edit-btn');


// For edit Modal 
let authorNameField = document.getElementById('editAuthor_name');
let editAuthorId = document.getElementById('editAuthor_id'); // hidden input

// Iterating through all the editButtons 
Array.from(editButtons).forEach(editButton => {
    // Some event that happen after clicking edit button
    editButton.addEventListener('click', () => {
        // Note: Modal gets Opened after editButton is clicked
        // Putting the existing value of targeted author record in the modal field :
        let authorRecord = editButton.parentElement.parentElement; // <tr> tag of author on which edit button is clicked

        /* Sample:
        <tr>
            <td class="author-info">1</td>
            <td class="author-info">Romantic</td>
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editauthor">
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
        let authorInformation = authorRecord.getElementsByClassName('author-info');
        let authorId = authorInformation[0];
        let authorName = authorInformation[1];

        // Putting values in field in modal 
        editAuthorId.value = authorId.innerText; // hidden input
        authorNameField.value = authorName.innerText;

    })
})


// Delete Operation 
// Grabbing delete buttons of all Authors
let deleteButtons = document.getElementsByClassName('delete-btn');

// For delete Modal 
let deleteAuthorId = document.getElementById('deleteAuthor_id'); // hidden input


// Iterating through all the editButtons 
Array.from(deleteButtons).forEach(deleteButton => {
    // Some event that happen after clicking delete button
    deleteButton.addEventListener('click', () => {
        // Note: Modal gets Opened after deleteButton is clicked

        // Trying to grab the author_id for sending through POST request:
        let authorRecord = deleteButton.parentElement.parentElement; // <tr> tag of author on which delete button is clicked

        let authorId = authorRecord.getElementsByClassName('author-info')[0];
        deleteAuthorId.value = authorId.innerText; // hidden input
    })
})
