<?php
// Define the current page
$current_page = 'Residency Status'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Residency Status' => '/rescmreg/layouts/StudentMainRecord/Residency Status/residency-status.php' 
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body, html {
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
    /* Add some top padding to the container to avoid overlap with the fixed breadcrumbs */
    .container {
        padding-top: 50px;
    }

    .residency-status h3 {
      text-align: center;
      color: white;
      margin-bottom: 20px;
      background-color: #174069;
      padding: 5px;
      border-radius: 3px;
    }
    .input-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    .student-id {
      flex: 1;
      display: flex;
      align-items: center;
    }
    .student-id span {
      margin-right: 10px;
      font-weight: bold;
    }
    .student-id input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    .checkboxes {
      width: 52%;
      display: flex;
      flex-direction: column;
    }
    .checkbox-label {
      display: flex;
      align-items: center;
      font-size: 14px;
      color: #174069;
      margin-bottom: 10px;
    }
    .checkbox-label input[type="checkbox"] {
      margin-right: 10px;
    }
    .student-info-container {
      display: flex;
      flex-wrap: wrap;
    }
    .student-info,
    .student-info2 {
      width: 45%;
      padding: 10px;
      margin-bottom: 10px;
    }
    .student-info p,
    .student-info2 p {
      margin-bottom: 8px;
      font-size: 16px;
      line-height: 1.6;
    }
    .student-id .search-button {
      display: inline-flex;
      align-items: center;
      padding: 10px;
      background-color: #174069;
      border: 1px solid #ccc;
      border-left: none;
      cursor: pointer;
      border-radius: 0 4px 4px 0;
      margin-left: 10px;
    }
    .student-id .refresh-button {
      display: inline-flex;
      align-items: center;
      padding: 10px;
      color: #ddd;
      background-color: #174069;
      border: 1px solid #ccc;
      border-right: none;
      cursor: pointer;
      border-radius: 4px 0 0 4px;
      margin-right: 10px;
    }
    hr {
      border: 0.5px solid #174069;
      margin-bottom: 30px;
    }
    .tor-heading {
      text-align: center;
      margin-bottom: 20px;
      background-color: #b3b3b3;
      padding: 5px;
      border-radius: 3px;
      margin-top: 85px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }
    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    .content {
      padding: 20px;
    }
    .radio-buttons {
      position: absolute;
      top: 0px;
      left: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      padding: 5px;
      border-radius: 5px;
    }
    .radio-buttons label {
      display: flex;
      align-items: center;
    }
    .print-button {
      position: absolute;
      top: 0px;
      right: 20px;
      display: flex;
      align-items: center;
      padding: 5px;
      border-radius: 5px;
      background-color: #f1f1f1;
      border: 1px solid #ddd;
    }
    .print-button .print {
      display: flex;
      align-items: center;
      background-color: transparent;
      border: none;
      cursor: pointer;
    }
    .print-button .print img {
      width: 24px;
      height: auto;
      margin-right: 5px;
    }
    .print-button .print span {
      font-size: 16px;
      color: #000;
    }
    .table-container {
      position: relative;
    }
    .bold-italic {
      font-weight: bold;
      font-style: italic;
    }
  </style>  
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

  <div class="container">
    <main class="content">
      <div class="residency-status">
        <h3>CURRICULUM RESIDENCY STATUS</h3>
        <div class="input-container">
          <div class="student-id">
            <button class="refresh-button" onclick="location.reload();">&#x21bb;</button>
            <span>Student ID:</span>
            <input type="text" id="studentId">
            <button class="search-button">&#x1F50D;</button>
          </div>
          <div class="checkboxes">
            <label for="hide-units" class="checkbox-label">
              <input type="checkbox" id="hide-units">
              Hide Units Required and Units Completion Information
            </label>
            <label for="hide-gwa" class="checkbox-label">
              <input type="checkbox" id="hide-gwa">
              Hide GWA Information
            </label>
          </div>
        </div>
        <hr>
        <div class="student-info-container">
          <div class="student-info">
            <p>Student Name: </p>
            <p>Course/Major: </p>
            <p>GWA: </p>
          </div>
          <div class="student-info2">
            <p>Year: </p>
            <p>Status: </p>
            <p>Total units required to this course: </p>
            <p>Total Credit Earned: </p>
          </div>
        </div>
        <div class="table-container">
          <div class="radio-buttons">
            <label>
              <input type="radio" name="course" value="course" checked>
              COURSE
            </label>
            <label>
              <input type="radio" name="course" value="bsit">
              BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY
            </label>
          </div>
          <div class="print-button">
            <button class="print" aria-label="Print" onclick="window.print()">
              <img src="/rescmreg/images/printers.png" alt="Print Icon">
              <span>Print</span>
            </button>
          </div>
        </div>
        <h3 class="tor-heading">TOR ENTRIES FROM CURRENT SCHOOL</h3>

        <?php
        // Define course data for credits earned
        $courses = [
        ['CCC121-18', 'Intermediate Programming', 2.0, 0.0, 2.0, 1.25, 'Passed'],
        ['CCL121-18', 'Intermediate Programming(Lab)', 0.0, 1.0, 1.0, 1.75, 'Passed'],
        ['PE 1 PF 18', 'Physical Fitness', 2.0, 0.0, 2.0, 1.5, 'Passed']
        ];

        // Calculate total credits earned
        $totalCredits = 0;
        foreach ($courses as $course) {
        $totalCredits += $course[4]; // Credits Earned are in index 4
        }

        // Format total credits to 1 decimal place
        $totalCredits = number_format($totalCredits, 1);
        ?>

        <table>
          <thead>
            <tr>
              <th>Course Code</th>
              <th>Course Description</th>
              <th colspan="2">Units</th>
              <th>Credits Earned</th>
              <th>Grade</th>
              <th>Remarks</th>
            </tr>
            <tr>
              <th></th>
              <th></th>
              <th>Lecture</th>
              <th>Laboratory</th>
              <th colspan="3"></th>
            </tr>
            <tr>
              <th>1st Year/ 1st Semester, SY 2022-2023</th>
              <th colspan="6"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
              <td><?= $course[0]; ?></td>
              <td><?= $course[1]; ?></td>
              <td><?= $course[2]; ?></td>
              <td><?= $course[3]; ?></td>
              <td><?= number_format($course[4], 1); ?></td> 
              <td><?= $course[5]; ?></td>
              <td><?= $course[6]; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="7"><strong class="bold-italic">Total units completed for 1st Year/ 1st Semester, SY 2022-2023:
              <?= $totalCredits; ?></strong></td>
              
            </tr>
          </tbody>
        </table>
      </div>
    </main>
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
