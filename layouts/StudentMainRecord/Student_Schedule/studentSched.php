<?php
// Define the current page
$current_page = 'Student Schedule'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Student Schedule' => '/rescmreg/layouts/StudentMainRecord/Student_Schedule/studentSched.php' 
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Schedule</title>
    <link rel="stylesheet" href="studentSchedules.css">
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
        <h1>Student Schedule</h1>
    </div>

    <!-- Main content area -->
    <div class="content">
        
        <!-- Search and filter area -->
        <div class="flex-container">
            <form method="POST" action="">
                <label for="student-id">Student ID No.:</label>
                <input type="text" id="student-id" name="student-id" placeholder="Enter Student ID" value="<?php echo isset($_POST['student-id']) ? $_POST['student-id'] : ''; ?>">
                
                <label for="school-year-start">School Year:</label>
                <input type="text" id="school-year-start" name="school-year-start" placeholder="From" value="<?php echo isset($_POST['school-year-start']) ? $_POST['school-year-start'] : ''; ?>">
                <span>to</span>
                <input type="text" id="school-year-end" name="school-year-end" placeholder="To" value="<?php echo isset($_POST['school-year-end']) ? $_POST['school-year-end'] : ''; ?>">
                
                <label for="term">Term:</label>
                <select id="term" name="term">
                    <option value="1st" <?php echo isset($_POST['term']) && $_POST['term'] == '1st' ? 'selected' : ''; ?>>1st</option>
                    <option value="2nd" <?php echo isset($_POST['term']) && $_POST['term'] == '2nd' ? 'selected' : ''; ?>>2nd</option>
                    <option value="summer" <?php echo isset($_POST['term']) && $_POST['term'] == 'summer' ? 'selected' : ''; ?>>Summer</option>
                </select>
                
                <button type="submit"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>
        
        <hr>

        <!-- Student information display -->
        <div class="student-info">
            <p><b>Student Name:</b> <?php echo "John Doe"; ?></p>
            <p><b>Program/Major (Curriculum year):</b> <?php echo "Computer Science (2021)"; ?></p>
            <span class="print-icon"><i class="fa-solid fa-print"></i> PRINT</span>
        </div>

        <!-- Student schedule table -->
        <table>
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Schedule</th>
                    <th>Section</th>
                    <th>Room #</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CS101</td>
                    <td>Introduction to Computer Science</td>
                    <td>M 8:00AM - 10:00AM</td>
                    <td>1BSCS-A</td>
                    <td>Room 101</td>
                    <td>Prof. John Doe</td>
                </tr>
                <tr>
                    <td>CS102</td>
                    <td>Data Structures</td>
                    <td>W 10:00AM - 12:00PM</td>
                    <td>1BSCS-A</td>
                    <td>Room 102</td>
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
