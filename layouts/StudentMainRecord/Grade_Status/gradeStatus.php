<?php
// Define the current page
$current_page = 'Grade Status'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Grade Status' => '/rescmreg/layouts/StudentMainRecord/Grade_Status/gradeStatus.php' 
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Status</title>
    <link rel="stylesheet" href="gradesStatus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    
</head>

<body>

 <!-- Breadcrumbs -->
 <div class="breadcrumbs">
        <?php 
        $breadcrumbCount = count($breadcrumbs);
        $currentIndex = 0;

        foreach ($breadcrumbs as $title => $link): 
            $currentIndex++;
            if ($title === $current_page): ?>
                <span class="current-page"><?= htmlspecialchars($title) ?></span>
            <?php else: ?>
                <a href="<?= htmlspecialchars($link) ?>"><?= htmlspecialchars($title) ?></a>
            <?php endif; ?>
            <?php if ($currentIndex < $breadcrumbCount): ?>
                <span>&gt;</span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <!-- Header Section -->
    <div class="header">
        <h1>Grade Status</h1>
    </div>

    <!-- Main content area -->
    <div class="content">

        <!-- Search Section -->
        <div class="search-section">
            <div class="flex-container">
                <form method="POST" action="">
                    <label for="student-number">Student Number:</label>
                    <input type="text" id="student-number" name="student-number" placeholder="Enter Student Number" value="<?php echo isset($_POST['student-number']) ? $_POST['student-number'] : ''; ?>">
                    <button type="submit"><i class="fa-solid fa-search"></i></button>
                    <button type="button" class="refresh-button"><i class="fas fa-sync-alt"></i></button>
                </form>
            </div>
        </div>

        <hr>

        <!-- Student Information -->
        <div class="student-info">
            <div class="student-details">
                <p><strong>Student ID:</strong> <?php echo isset($_POST['student-number']) ? $_POST['student-number'] : '00-00000-000'; ?></p>
                <p><strong>Student Name:</strong> <?php echo "Jane Doe"; // You can dynamically change this based on the student's number ?></p>
            </div>
            <div class="total-course">
                <p><strong>Total Course Count:</strong> 1</p>
            </div>
        </div>

        <!-- Options and Table Section -->
        <div class="options">
            <div class="flex-options">
                <label><input type="checkbox"> Remove Course Information</label>
                <label><input type="checkbox"> Remove Instructor Information</label>
                <label><input type="checkbox"> Show Grade</label>
                <label><input type="checkbox"> Show Address</label>
                <span class="print-icon"><i class="fa-solid fa-print"></i> PRINT</span>
            </div>
        </div>

        <!-- Grade Table -->
        <table>
            <thead>
                <tr>
                    <th>Count</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course Code</th>
                    <th>Grade</th>
                    <th>Program</th>
                    <th>Section</th>
                    <th>Instructor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?php echo isset($_POST['student-number']) ? $_POST['student-number'] : '00-00000-000'; ?></td>
                    <td>Jane Doe</td>
                    <td>ICIT-XX</td>
                    <td>1.5</td>
                    <td>BSIT</td>
                    <td>1BSIT-3</td>
                    <td>Prof. Jane Doe</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>       
         document.addEventListener('DOMContentLoaded', function() {
        // Select the breadcrumb container
        const breadcrumbContainer = document.querySelector('.breadcrumbs');

        // Add event listener to 'Update' button to add breadcrumb item
        document.querySelector('.change-btn[data-breadcrumb]').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the breadcrumb name from the data attribute
            const breadcrumbName = this.getAttribute('data-breadcrumb');

            // Generate the new breadcrumb item
            const newBreadcrumb = `<a href="${this.href}">${breadcrumbName}</a>`;

            // Append new breadcrumb to container with separator
            breadcrumbContainer.innerHTML += ` &gt; ${newBreadcrumb}`;

            // Redirect to the actual link after updating the breadcrumb
            setTimeout(() => {
                window.location.href = this.href;
            }, 100); // Small delay to visually update breadcrumbs first
        });
    });
    </script>
            

</body>

</html>
