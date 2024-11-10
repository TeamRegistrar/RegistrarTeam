<?php
// Include database connection
include('db_connection.php');

// Initialize variables for filtering
$term = isset($_GET['term']) ? $_GET['term'] : '';
$start_year = isset($_GET['start_year']) ? $_GET['start_year'] : '';
$end_year = isset($_GET['end_year']) ? $_GET['end_year'] : '';
$grades_status = isset($_GET['grades-status']) && is_array($_GET['grades-status']) ? $_GET['grades-status'] : [];
$faculty_name = isset($_GET['faculty_name']) ? $_GET['faculty_name'] : '';
$college_dept_code = isset($_GET['college_dept_code']) ? $_GET['college_dept_code'] : '';

// Build SQL query with filters
$sql = "SELECT faculty_id, faculty_name AS employee_name, college_dept_code AS college, status, students_enrolled, students_with_grade, subject_code, section, start_year, end_year FROM faculty_grades_status WHERE 1=1";

if (!empty($term)) {
    $sql .= " AND term LIKE '%$term%'";
}
if (!empty($start_year) && !empty($end_year)) {
    $sql .= " AND start_year BETWEEN '$start_year' AND '$end_year'";
} else if (!empty($start_year)) {
    $sql .= " AND start_year >= '$start_year'";
} else if (!empty($end_year)) {
    $sql .= " AND start_year <= '$end_year'";
}
if (!empty($faculty_name)) {
    $sql .= " AND faculty_name LIKE '%$faculty_name%'";
}
if (!empty($college_dept_code)) {
    $sql .= " AND college_dept_code LIKE '%$college_dept_code%'";
}
if (!empty($grades_status)) {
    $status_conditions = [];
    foreach ($grades_status as $status) {
        switch ($status) {
            case 'show-all-not-verified':
                $status_conditions[] = "status = 'Not Verified'";
                break;
            case 'show-all-verified':
                $status_conditions[] = "status = 'Verified'";
                break;
            case 'grades-encoded':
                $status_conditions[] = "status = 'Encoded'";
                break;
            case 'grades-not-encoded':
                $status_conditions[] = "status = 'Not Encoded'";
                break;
        }
    }
    if (!empty($status_conditions)) {
        $sql .= " AND (" . implode(' OR ', $status_conditions) . ")";
    }
}

// Execute the query
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error . " - SQL: " . $sql);
}

$no_record_found = $result->num_rows === 0; // Check if no records were found
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encoding of Grades</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
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
    </style>
</head>
<body>
     <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
  
    <span class="current-page">Encoding of Grades</span>
</div>
<!-- Main content -->
<div class="main-content p-6" id="mainContent">
<section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
    <div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-center mb-6">Encoding Of Grades</h1>
        <form id="filterForm" method="GET" class="mb-6">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="term" class="block text-sm font-medium text-gray-700">Term</label>
                    <select name="term" id="term" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Select Term</option>
                        <option value="1st Year" <?php if ($term === '1st Year') echo 'selected'; ?>>1st Year</option>
                        <option value="2nd Year" <?php if ($term === '2nd Year') echo 'selected'; ?>>2nd Year</option>
                        <option value="3rd Year" <?php if ($term === '3rd Year') echo 'selected'; ?>>3rd Year</option>
                        <option value="4th Year" <?php if ($term === '4th Year') echo 'selected'; ?>>4th Year</option>
                    </select>
                </div>
                <div>
                    <label for="start_year" class="block text-sm font-medium text-gray-700">Start Year</label>
                    <input type="date" name="start_year" id="start_year" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo htmlspecialchars($start_year); ?>">
                </div>
                <div>
                    <label for="end_year" class="block text-sm font-medium text-gray-700">End Year</label>
                    <input type="date" name="end_year" id="end_year" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo htmlspecialchars($end_year); ?>">
                </div>
                <div>
                    <label for="faculty_name" class="block text-sm font-medium text-gray-700">Faculty Name</label>
                    <input type="text" name="faculty_name" id="faculty_name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo htmlspecialchars($faculty_name); ?>">
                </div>
                <div>
                    <label for="college_dept_code" class="block text-sm font-medium text-gray-700">College Dept Code</label>
                    <input type="text" name="college_dept_code" id="college_dept_code" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo htmlspecialchars($college_dept_code); ?>">
                </div>
            </div>

            <h2 class="text-2xl font-bold text-center mt-10">Grades Status For</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-10">
                <div class="flex items-center justify-center">
                    <input type="checkbox" name="grades-status[]" value="show-all-not-verified" <?php if (in_array('show-all-not-verified', $grades_status)) echo 'checked'; ?>>
                    <label for="show-all-not-verified" class="ml-2 text-sm font-medium">Show All Not Verified</label>
                </div>
                <div class="flex items-center justify-center">
                    <input type="checkbox" name="grades-status[]" value="show-all-verified" <?php if (in_array('show-all-verified', $grades_status)) echo 'checked'; ?>>
                    <label for="show-all-verified" class="ml-2 text-sm font-medium">Show All Verified</label>
                </div>
                <div class="flex items-center justify-center">
                    <input type="checkbox" name="grades-status[]" value="grades-encoded" <?php if (in_array('grades-encoded', $grades_status)) echo 'checked'; ?>>
                    <label for="grades-encoded" class="ml-2 text-sm font-medium">Grades Encoded</label>
                </div>
                <div class="flex items-center justify-center">
                    <input type="checkbox" name="grades-status[]" value="grades-not-encoded" <?php if (in_array('grades-not-encoded', $grades_status)) echo 'checked'; ?>>
                    <label for="grades-not-encoded" class="ml-2 text-sm font-medium">Grades Not Encoded</label>
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-md">Proceed</button>
                <a href="SetEncodingGrades.php" class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-md text-center inline-block">Set Encoding Grades</a>
            </div>
        </form>

        <div class="table-responsive">
            <?php if (!$no_record_found): ?>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr style="background-color: #012D5E; color: white;">
                            <th scope="col" class="px-6 py-3 text-center">Faculty</th>
                            <th scope="col" class="px-6 py-3 text-center">College</th>
                            <th scope="col" class="px-6 py-3 text-center">Status</th>
                            <th scope="col" class="px-6 py-3 text-center">Students Enrolled</th>
                            <th scope="col" class="px-6 py-3 text-center">Students With Grade</th>
                            <th scope="col" class="px-6 py-3 text-center">Subject Code</th>
                            <th scope="col" class="px-6 py-3 text-center">Section</th>
                            <th scope="col" class="px-6 py-3 text-center">Start Year</th>
                            <th scope="col" class="px-6 py-3 text-center">End Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 text-center"><?php echo $row['faculty_id'] . '/' . $row['employee_name']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['college']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['status']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['students_enrolled']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['students_with_grade']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['subject_code']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['section']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['start_year']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['end_year']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-red-600">No records found for the selected filters.</p>
            <?php endif; ?>
        </div>
    </div>
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
