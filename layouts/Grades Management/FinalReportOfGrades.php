<?php
// Include database connection
$host = 'localhost'; // Your database host
$username = 'root'; // Your database username
$password = ''; // Your database password
$database = 'grades_final_report'; // Your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$students = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $gradesFor = $_POST['gradesFor'];
    $schoolYear = $_POST['schoolYear'];
    $term = $_POST['term'];
    $employeeIDName = $_POST['employeeIDName'];
    $sectionHandled = $_POST['sectionHandled'];
    $subjectTitle = $_POST['subjectTitle'];

    // Query to get faculty_id based on employee ID or Name
    $facultyQuery = "SELECT faculty_id FROM faculty WHERE faculty_name LIKE '%$employeeIDName%'";
    $facultyResult = $conn->query($facultyQuery);

    if ($facultyResult->num_rows > 0) {
        // Get the faculty_id from the result
        $facultyRow = $facultyResult->fetch_assoc();
        $faculty_id = $facultyRow['faculty_id'];

        // Query to get students based on faculty_id and other form inputs
        $studentQuery = "SELECT s.student_id, s.student_name, s.year, s.credits_earned, gr.midterm_grade, gr.final_grade, gr.remarks
                         FROM grades_report gr
                         JOIN students s ON gr.student_id = s.student_id
                         WHERE gr.faculty_id = '$faculty_id'
                         AND gr.semester = '$term'
                         AND gr.school_year = '$schoolYear'
                         AND gr.subject_title LIKE '%$subjectTitle%'
                         AND gr.section LIKE '%$sectionHandled%'";

        $result = $conn->query($studentQuery);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades Form</title>
    <!-- Load Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Load Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Load Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
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
        .container {
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <a href="/rescmreg/index.php">Dashboard</a>
        <span>&gt;</span>
        <span class="current-page">Final Report of Grades</span>
    </div>

    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">
        <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
            <div class="container mx-auto px-4 py-8">
                <h1 class="text-2xl font-bold text-center mb-4">Final Report Of Grades</h1>
                <form method="POST">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="gradesFor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grades For:</label>
                            <select id="gradesFor" name="gradesFor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select</option>
                                <option value="Grade 1">Midterm</option>
                                <option value="Grade 2">Final</option>
                            </select>
                        </div>
                        <div>
                            <label for="schoolYear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School Year:</label>
                            <select id="schoolYear" name="schoolYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester:</label>
                            <select id="term" name="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                            </select>
                        </div>
                        <div>
                            <label for="employeeIDName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee ID/Name:</label>
                            <input type="text" id="employeeIDName" name="employeeIDName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="sectionHandled" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section Handled:</label>
                            <input type="text" id="sectionHandled" name="sectionHandled" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="subjectTitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject Title:</label>
                            <input type="text" id="subjectTitle" name="subjectTitle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>

                    <div class="text-center mt-6">
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded-full">
                            Proceed
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Table to display results -->
        <section class="student-results mt-10 p-6 bg-white shadow-md rounded-lg">
            <?php if (count($students) > 0): ?>
                <h2 class="text-xl font-bold mb-4">Student List</h2>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Student ID</th>
                            <th class="px-4 py-2 border">Student Name</th>
                            <th class="px-4 py-2 border">Year</th>
                            <th class="px-4 py-2 border">Credits Earned</th>
                            <th class="px-4 py-2 border">Midterm Grade</th>
                            <th class="px-4 py-2 border">Final Grade</th>
                            <th class="px-4 py-2 border">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td class="px-4 py-2 border"><?= $student['student_id']; ?></td>
                                <td class="px-4 py-2 border"><?= $student['student_name']; ?></td>
                                <td class="px-4 py-2 border"><?= $student['year']; ?></td>
                                <td class="px-4 py-2 border"><?= $student['credits_earned']; ?></td>
                                <td class="px-4 py-2 border"><?= $student['midterm_grade']; ?></td>
                                <td class="px-4 py-2 border"><?= $student['final_grade']; ?></td>
                                <td class="px-4 py-2 border"><?= $student['remarks']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No results found.</p>
            <?php endif; ?>
        </section>
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
    </script>
</body>
</html>
