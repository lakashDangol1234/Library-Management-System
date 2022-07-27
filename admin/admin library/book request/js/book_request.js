// For inserting issueBook_id and bid to the modal form hidden input
let issueBook_id = document.getElementById('issueBook_id'); // hidden input
let bid = document.getElementById('bid'); // hidden input

// Grabbing approve buttons of all books
let approveButtons = document.getElementsByClassName('approve-btn');
Array.from(approveButtons).forEach(approveButton=>{
    approveButton.addEventListener('click',()=>{
        // Note: Modal gets Opened after approveButton is clicked
        issueBook_id.value= approveButton.parentElement.parentElement.dataset.issueBookId; // issueBook_id value is saved in the tr tag's data attribute
        bid.value= approveButton.parentElement.parentElement.dataset.bookId; // bid value is saved in the tr tag's data attribute
    })
})