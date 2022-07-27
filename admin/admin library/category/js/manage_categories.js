// Edit Operation 
// Grabbing edit buttons of all categories
let editButtons = document.getElementsByClassName('edit-btn');


// For edit Modal 
let categoryNameField = document.getElementById('editCategory_name');
let editCategoryId = document.getElementById('editCategory_id'); // hidden input

// Iterating through all the editButtons 
Array.from(editButtons).forEach(editButton => {
    // Some event that happen after clicking edit button
    editButton.addEventListener('click', () => {
        // Note: Modal gets Opened after editButton is clicked
        // Putting the existing value of targeted category record in the modal field :
        let categoryRecord = editButton.parentElement.parentElement; // <tr> tag of Category on which edit button is clicked

        /* Sample:
        <tr>
            <td class="category-info">1</td>
            <td class="category-info">Romantic</td>
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory">
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
        let categoryInformation = categoryRecord.getElementsByClassName('category-info');
        let categoryId = categoryInformation[0];
        let categoryName = categoryInformation[1];

        // Putting values in field in modal 
        editCategoryId.value = categoryId.innerText; // hidden input
        categoryNameField.value = categoryName.innerText;

    })
})


// Delete Operation 
// Grabbing delete buttons of all Categories
let deleteButtons = document.getElementsByClassName('delete-btn');

// For delete Modal 
let deleteCategoryId = document.getElementById('deleteCategory_id'); // hidden input


// Iterating through all the editButtons 
Array.from(deleteButtons).forEach(deleteButton => {
    // Some event that happen after clicking delete button
    deleteButton.addEventListener('click', () => {
        // Note: Modal gets Opened after deleteButton is clicked

        // Trying to grab the category_id for sending through POST request:
        let categoryRecord = deleteButton.parentElement.parentElement; // <tr> tag of Category on which delete button is clicked

        let categoryId = categoryRecord.getElementsByClassName('category-info')[0];
        deleteCategoryId.value = categoryId.innerText; // hidden input
    })
})
