<?php
include 'db.php';

// Handle Add/Save Category
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category-id']; 
    $category_name = $_POST['category-name'];

    if ($category_id) {
        // Update if ID exists
        $stmt = $conn->prepare("UPDATE `category` SET CategoryName = ? WHERE CategoryId = ?");
        $stmt->bind_param("si", $category_name, $category_id);
    } else {
        // Insert new record
        $stmt = $conn->prepare("INSERT INTO `category` (CategoryName) VALUES (?)");
        $stmt->bind_param("s", $category_name);
    }

    if ($stmt->execute()) {
        header("Location: update-category.php"); // Refresh after operation
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch categories
$sql = "SELECT * FROM `category`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link rel="stylesheet" href="/rescmreg/css/updatecategories.css">
    <style>
      body, html {
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }

    /* Breadcrumb styling */
    .breadcrumbs {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        font-size: 14px;
        color: #6c757d;
        padding: 12px 12px;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        z-index: 1000;
        border-radius: 7px;
        font-family: Arial, sans-serif;
        gap: 15px;
    }
    .breadcrumbs a {
        margin-left: 10px;
        text-decoration: none;
        color: #174069;
        font-weight: bold;
        transition: color 0.2s ease-in-out;
    }
    .breadcrumbs a:hover {
        color: #0056b3;
    }
    .breadcrumbs span {
        color: #6c757d;
    }
    .breadcrumbs .current-page {
        color: #FFA500;; /* Mustard yellow color */
        font-weight: bold;
    }

    </style>
</head>
<body>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/CourseMaintenance/course-maintenance.php">Course Maintenance</a>
    <span>&gt;</span>
    <span class="current-page">Update Category</span>
</div>

<div class="container">
    <a href="/rescmreg/layouts/coursemaintenance/course-maintenance.php" class="back-button">
        <img src="/rescmreg/images/go-back.png" alt="Go Back">
    </a>

    <h3>Course Category Maintenance</h3>
    <form method="POST" action="">
        <input type="hidden" id="category-id" name="category-id"> <!-- Hidden input for Category ID -->
        
        <div class="form-category">
            <label for="category-name" style="margin: 0;">Category Name</label> 
            <input type="text" id="category-name" name="category-name" required>

            <div class="form-buttons">
                <button type="submit">
                    <img src="/rescmreg/images/add.png" alt="Save" class="button-icon"> Add/Save
                </button>

                <button type="button" id="cancel-clear-btn">
                    <img src="/rescmreg/images/cancel.png" alt="Remove" class="button-icon"> Cancel/Clear
                </button>
            </div>
        </div>
    </form>

    <h4>List of Existing Categories</h4>
    <table>
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['CategoryName']) ?></td>
                    <td>
                        <button class="edit-btn" 
                                data-id="<?= $row['CategoryId'] ?>" 
                                data-name="<?= htmlspecialchars($row['CategoryName']) ?>">
                            Edit
                        </button>
                    </td>
                    <td>
                        <button class="delete-btn" data-id="<?= $row['CategoryId'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
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

    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-id'); // Get category ID

            if (confirm('Are you sure you want to delete this category?')) {
                // Send AJAX request to delete-category.php
                fetch('delete-category.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({ 'id': categoryId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the row from the table
                        this.closest('tr').remove();
                        alert('Category deleted successfully.');
                    } else {
                        alert('Failed to delete category: ' + data.error);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });

    // Clear form when 'Cancel / Clear' button is clicked
    document.getElementById('cancel-clear-btn').addEventListener('click', function () {
        document.getElementById('category-id').value = '';  // Clear the hidden ID field
        document.getElementById('category-name').value = ''; // Clear the input field
    });

    // Populate form with existing data for editing
    document.querySelectorAll('.edit-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-id');
            const categoryName = this.getAttribute('data-name');

            document.getElementById('category-id').value = categoryId;  // Set hidden ID field
            document.getElementById('category-name').value = categoryName;  // Set name field
        });
    });
</script>

<?php $conn->close(); ?>
</body>
</html>
