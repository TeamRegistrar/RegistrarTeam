<?php
// Include the database connection
include('db_connection.php');

// Insert data into the database if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['examName']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
        // Escape the input data to prevent SQL injection
        $examName = mysqli_real_escape_string($conn, $_POST['examName']);
        $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
        $endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
        $employeeName = isset($_POST['employeeName']) ? mysqli_real_escape_string($conn, $_POST['employeeName']) : '';

        // Check if the exam entry already exists to prevent duplication
        $checkSql = "SELECT * FROM grade_encodings WHERE exam_name = '$examName' AND encoding_start_date = '$startDate' AND encoding_end_date = '$endDate' AND faculty_employee_id = '$employeeName'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            // If the record exists, show an error message
            echo "This exam encoding entry already exists.";
        } else {
            // Insert the form data into the grade_encodings table
            $sql = "INSERT INTO grade_encodings (exam_name, encoding_start_date, encoding_end_date, faculty_employee_id) 
                    VALUES ('$examName', '$startDate', '$endDate', '$employeeName')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}

// Delete data from the database if a delete request is made
if (isset($_GET['delete_id']) && isset($_GET['confirm_delete']) && $_GET['confirm_delete'] == 'yes') {
    $deleteId = mysqli_real_escape_string($conn, $_GET['delete_id']);

    // Delete the record from the grade_encodings table
    $deleteSql = "DELETE FROM grade_encodings WHERE id = '$deleteId'";

    if (mysqli_query($conn, $deleteSql)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Retrieve data from the database
$sql = "SELECT * FROM grade_encodings";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Encoding</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            color: #FFA500;
            font-weight: bold;
        }

        /* Main content styles */
        .container {
            padding-top: 50px;
        }

        /* Aligning the start date and end date */
        .date-container {
            display: flex;
            gap: 1rem;
        }

        .date-container input {
            width: 100%;
        }

        /* Adjusting form inputs */
        .form-input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .table-section {
            margin-top: 2rem;
        }

        .table-section table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-section th,
        .table-section td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .delete-btn {
            background-color: #e74c3c; /* Red */
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        .delete-btn:hover {
            background-color: #c0392b; /* Darker Red */
        }

        .delete-btn:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <a href="/rescmreg/index.php">Dashboard</a>
        <span>&gt;</span>
        <a href="/rescmreg/layouts/Grades Management/EncodingOfGrades.php">Encoding of Grades</a>
        <span>&gt;</span>
        <span class="current-page">Set Encoding Grades</span>
    </div>

    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-center mb-4">Grade Encoding</h1>
            <form method="POST" action="">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="examName" class="block text-sm font-medium text-gray-700">Exam Name</label>
                        <input type="text" id="examName" name="examName" class="form-input" required>
                    </div>
                    <div class="date-container">
                        <div>
                            <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" id="startDate" name="startDate" class="form-input" required>
                        </div>
                        <div>
                            <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" id="endDate" name="endDate" class="form-input" required>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <input type="checkbox" id="allowSpecificFaculty" name="allowSpecificFaculty" class="mr-2">
                    <label for="allowSpecificFaculty" class="inline-block text-sm font-medium text-gray-700">Allow Specific Faculty</label>
                </div>
                <div id="specificFacultyInput" class="mt-2 hidden">
                    <label for="employeeName" class="block text-sm font-medium text-gray-700">Enter Employee ID/Name</label>
                    <input type="text" id="employeeName" name="employeeName" class="form-input">
                </div>
                <div class="flex justify-between mt-4">
                   <a href="EncodingOfGrades.php" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Back</a>
                   <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Proceed</button>
                </div>
            </form>

            <!-- Data Table Section -->
            <section class="table-section">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table>
                        <thead>
                            <tr style="background-color: #012D5E; color: white;">
                                <th>Exam Name</th>
                                <th>Encoding Date Range</th>
                                <th>Faculty Employee ID</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Check if result is valid before accessing num_rows
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['exam_name'] . "</td>";
                                    echo "<td>" . $row['encoding_start_date'] . " to " . $row['encoding_end_date'] . "</td>";
                                    echo "<td>" . $row['faculty_employee_id'] . "</td>";
                                    echo "<td><a href='#' class='delete-btn' data-id='" . $row['id'] . "'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No records found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <script>
        // Add event listener to delete buttons
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const recordId = this.dataset.id;
                const confirmDelete = confirm('Are you sure you want to delete this record?');
                if (confirmDelete) {
                    window.location.href = '?delete_id=' + recordId + '&confirm_delete=yes';
                }
            });
        });

        // Toggle visibility of the specific faculty input field
        const allowSpecificFacultyCheckbox = document.getElementById('allowSpecificFaculty');
        const specificFacultyInput = document.getElementById('specificFacultyInput');
        allowSpecificFacultyCheckbox.addEventListener('change', function() {
            if (this.checked) {
                specificFacultyInput.style.display = 'block';
            } else {
                specificFacultyInput.style.display = 'none';
            }
        });
    </script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
