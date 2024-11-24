<?php
// Include database connection
$host = 'localhost'; // Your database host
$username = 'root'; // Your database username
$password = ''; // Your database password
$database = 'completion_list'; // Your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$studentId = $schoolYear = $term = '';
$result = null; // Initialize $result to avoid the undefined variable warning

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate studentId
    if (empty($_POST['studentId'])) {
        $error = "Student ID is required.";
    } else {
        $studentId = $_POST['studentId'];
        $schoolYear = $_POST['schoolYear'];
        $term = $_POST['term'];

        // Fetch data from the database based on the inputs
        $sql = "SELECT * FROM completion_of_grades WHERE student_id LIKE '%$studentId%' AND school_year LIKE '%$schoolYear%' AND term LIKE '%$term%'";
        $result = $conn->query($sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Grades</title>
    <!-- Load Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Load Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Load Tailwind CSS -->
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
            color: #FFA500; /* Mustard yellow color */
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
        <span class="current-page">Completion of Grades</span>
    </div>
    
    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">
        <div class="container mx-auto px-4 py-8">
            <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
                <h1 class="text-2xl font-bold text-center mb-4">Completion Of Grades</h1>
                <form method="POST" action="" onsubmit="return validateForm()">
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="schoolYear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School Year:</label>
                            <select id="schoolYear" name="schoolYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                            </select>
                        </div>
                        <div>
                            <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Term:</label>
                            <select id="term" name="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                            </select>
                        </div>
                        <div>
                            <label for="studentId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID:</label>
                            <input type="text" id="studentId" name="studentId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php if (isset($error)) { echo "<p class='text-red-500 text-sm'>$error</p>"; } ?>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceed</button>
                    </div>
                </form>
            </section>
            
            <div class="mt-8">
                <section class="table-section p-6 bg-white shadow-md rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr style="background-color: #012D5E; color: white;">
                                    <th scope="col" class="px-6 py-3 text-center">Subject Code</th>
                                    <th scope="col" class="px-6 py-3 text-center">Subject Name</th>
                                    <th scope="col" class="px-6 py-3 text-center">Instructor</th>
                                    <th scope="col" class="px-6 py-3 text-center">Status</th>
                                    <th scope="col" class="px-6 py-3 text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Check if there are results and loop through them
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr class='odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700'>
                                                <td class='px-6 py-4 text-center'>{$row['subject_code']}</td>
                                                <td class='px-6 py-4 text-center'>{$row['subject_name']}</td>
                                                <td class='px-6 py-4 text-center'>{$row['instructor']}</td>
                                                <td class='px-6 py-4 text-center'>{$row['status']}</td>
                                                <td class='px-6 py-4 text-center'><button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded'>Complete</button></td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center text-gray-500'>No records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Validation Script -->
    <script>
        function validateForm() {
            var studentId = document.getElementById('studentId').value;
            if (studentId == "") {
                alert("Student ID is required.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
