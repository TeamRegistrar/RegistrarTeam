// Function to add item to the "PASSED" list and hide it from "REQUIRED ITEMS"
function addItem(itemName) {
    // Find the item in the required list by its data attribute
    const requiredItem = document.querySelector(`li[data-item='${itemName}']`);
    if (requiredItem) {
        // Hide the item from "REQUIRED ITEMS" list
        requiredItem.style.display = 'none';

        // Create the passed item element
        const passedItem = document.createElement('li');
        passedItem.textContent = itemName;

        // Create remove button for each passed item
        const removeBtn = document.createElement('span');
        removeBtn.textContent = " -";
        removeBtn.classList.add('btn-remove');
        removeBtn.onclick = function() {
            removeItem(passedItem, requiredItem);
        };

        // Append the remove button to the passed item
        passedItem.appendChild(removeBtn);

        // Append the passed item to the passed items list
        document.getElementById('passedItemsList').appendChild(passedItem);

        // Add current date to date passed list
        const datePassed = new Date().toLocaleDateString();
        const dateItem = document.createElement('li');
        dateItem.textContent = datePassed;

        document.getElementById('datePassedList').appendChild(dateItem);
    }
}

// Function to remove item from the "PASSED" list and show it back in "REQUIRED ITEMS"
function removeItem(passedItem, requiredItem) {
    // Remove the passed item from the "PASSED" list
    passedItem.remove();

    // Find and remove the corresponding date item
    const datePassedList = document.getElementById('datePassedList');
    if (datePassedList.childNodes.length > 0) {
        datePassedList.removeChild(datePassedList.childNodes[0]);
    }

    // Show the item back in the "REQUIRED ITEMS" list
    if (requiredItem) {
        requiredItem.style.display = 'flex';
    }
}
// Breadcrumb handling based on navigation
document.addEventListener('DOMContentLoaded', function() {
    const breadcrumb = document.getElementById('breadcrumb');
    const referrer = document.referrer;

    // Check if navigated from Course Maintenance
    if (referrer.includes('course-maintenance.php')) {
        // Breadcrumb already shows "Update Category"
    } else {
        // Adjust breadcrumb if accessed directly or from elsewhere
        breadcrumb.innerHTML = '<a href="/rescmreg/layouts/home.php">Home</a> &gt; <span>Update Category</span>';
    }
});
