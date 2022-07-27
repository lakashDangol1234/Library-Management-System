// Showing and hiding (Toggling) the drop down menu when clicked on the notificaton / bell icon
// Showing and hiding (Toggling) the drop down menu when clicked on the dropdown arrow icon

// Grabbing elements for notification icon 
let bellIcon = document.getElementById('bell-icon-li');
let bellIconDropdown = document.querySelector('ul[aria-labelledby="bell-icon"]');
let bellIconDropdownClassList=bellIconDropdown.classList;

// Grabbing elements for dropdown arrow icon 
let dropdownArrow = document.getElementById('dropdown-arrow-li');
let dropdownArrowDropdown = document.querySelector('ul[aria-labelledby="dropdown-arrow"]');
let dropdownArrowDropdownClassList = dropdownArrowDropdown.classList;


// Disabling and enabling dropdown menu for notification
// Enabling event capturing . GrandParent -> Father -> Child (document -> bellIcon)
bellIcon.addEventListener('click', (e) => {
    bellIconDropdownClassList.add('animation');
    if(bellIconDropdownClassList.contains('show')){
        // For animation purpose
        bellIconDropdownClassList.remove('show');
        bellIconDropdownClassList.add('fade-out');
        setTimeout(()=>{
            bellIconDropdownClassList.remove('animation');
            bellIconDropdownClassList.remove('fade-out');
        },200)
    }else{
        // For animation purpose
       bellIconDropdownClassList.add('show');
       bellIconDropdownClassList.add('fade-in');
       setTimeout(()=>{
        bellIconDropdownClassList.remove('animation');
        bellIconDropdownClassList.remove('fade-in');
       },200)
    }
}, true)

// Disabling and enabling dropdown menu for notification
// Enabling event capturing . GrandParent -> Father -> Child (document -> dropdownArrow)
dropdownArrow.addEventListener('click', (e) => {
    dropdownArrowDropdownClassList.add('animation');
    if(dropdownArrowDropdownClassList.contains('show')){
        // For animation purpose
        dropdownArrowDropdownClassList.remove('show');
        dropdownArrowDropdownClassList.add('fade-out');
        setTimeout(()=>{
            dropdownArrowDropdownClassList.remove('animation');
            dropdownArrowDropdownClassList.remove('fade-out');
        },200)
    }else{
        // For animation purpose
       dropdownArrowDropdownClassList.add('show');
       dropdownArrowDropdownClassList.add('fade-in');
       setTimeout(()=>{
        dropdownArrowDropdownClassList.remove('animation');
        dropdownArrowDropdownClassList.remove('fade-in');
       },200)
    }
}, true)


// Hiding the dropdown if clicked on the outerside as well
document.addEventListener('click', (e) => {
    // For bell icon
    if (bellIconDropdownClassList.contains('show') && !bellIconDropdown.contains(e.target) && !bellIcon.contains(e.target)) {
        bellIconDropdownClassList.remove('show');
        bellIconDropdownClassList.add('animation');
        bellIconDropdownClassList.add('fade-out');
        setTimeout(()=>{
            bellIconDropdownClassList.remove('animation');
            bellIconDropdownClassList.remove('fade-out');
        },200)
    }

    // For dropdown arrow
    if (dropdownArrowDropdown.classList.contains('show') && !dropdownArrowDropdown.contains(e.target) && !dropdownArrow.contains(e.target)) {
        dropdownArrowDropdownClassList.remove('show');
        dropdownArrowDropdownClassList.add('animation');
        dropdownArrowDropdownClassList.add('fade-out');
        setTimeout(()=>{
            dropdownArrowDropdownClassList.remove('animation');
            dropdownArrowDropdownClassList.remove('fade-out');
        },200)
    }

}, true);



