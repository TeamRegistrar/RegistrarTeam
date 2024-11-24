<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // default username for XAMPP and phpMyAdmin
$password = ""; // default password for XAMPP and phpMyAdmin
$dbname = "facultygradesdb"; // Name of the database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for the filters from GET request (if filters are applied)
$school_year = isset($_GET['schoolYear']) ? $_GET['schoolYear'] : '';
$term = isset($_GET['term']) ? $_GET['term'] : '';
$faculty_id = isset($_GET['facultyId']) ? $_GET['facultyId'] : '';

// Initialize result variable to null
$result = null;

// Only run the query if at least one filter is applied
if ($school_year || $term || $faculty_id) {
    $sql = "SELECT * FROM grades_unlocking WHERE 1=1";  // Base query

    $conditions = []; // Initialize an empty array for conditions

    if ($school_year) {
        $conditions[] = "school_year = '$school_year'"; // Add condition for school year if it's set
    }
    if ($term) {
        $conditions[] = "term = '$term'"; // Add condition for term if it's set
    }
    if ($faculty_id) {
        $conditions[] = "faculty_id = '$faculty_id'"; // Add condition for faculty ID if it's set
    }

    // Only append conditions if there are any
    if (count($conditions) > 0) {
        $sql .= " AND " . implode(" AND ", $conditions); // Join conditions with 'AND' and append to the query
    }

    // Execute the query
    $result = $conn->query($sql);
} else {
    // If no filters are selected, don't run any query (no data will be shown)
    $result = null;
}

// Check if the Unlock One button was clicked
if (isset($_POST['unlock_one'])) {
    // Redirect to another page (e.g., unlock_success.php)
    header("Location: unlock_success.php"); // Change 'unlock_success.php' to your desired page
    exit(); // Always call exit after header redirection
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Grades</title>
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
        .container {
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <div class="breadcrumbs">
        <a href="/rescmreg/index.php">Dashboard</a>
        <span>&gt;</span>
        <span class="current-page">Unlocking of Grades</span>
    </div>

    <div class="main-content p-6" id="mainContent">
        <div class="container mx-auto px-4 py-8">
            <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
                <h1 class="text-2xl font-bold text-center mb-4">Unlocking Of Grades</h1>
                <form method="GET" action="">
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="schoolYear" class="block mb-2 text-sm font-medium text-gray-900">School Year:</label>
                            <select id="schoolYear" name="schoolYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select</option>
                                <option value="2023-2024" <?php echo ($school_year == '2023-2024') ? 'selected' : ''; ?>>2023-2024</option>
                                <option value="2024-2025" <?php echo ($school_year == '2024-2025') ? 'selected' : ''; ?>>2024-2025</option>
                            </select>
                        </div>
                        <div>
                            <label for="term" class="block mb-2 text-sm font-medium text-gray-900">Term:</label>
                            <select id="term" name="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select</option>
                                <option value="1st Semester" <?php echo ($term == '1st Semester') ? 'selected' : ''; ?>>1st Semester</option>
                                <option value="2nd Semester" <?php echo ($term == '2nd Semester') ? 'selected' : ''; ?>>2nd Semester</option>
                            </select>
                        </div>
                        <div>
                            <label for="facultyId" class="block mb-2 text-sm font-medium text-gray-900">Faculty ID:</label>
                            <input type="text" id="facultyId" name="facultyId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $faculty_id; ?>">
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
                        <h2 class="text-xl font-bold text-center mb-4">Faculty List Load</h2>
                        <?php if ($result && $result->num_rows > 0) { ?>
                            <table id="gradesTable" class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr style="background-color: #012D5E; color: white;">
                                        <th scope="col" class="px-6 py-3 text-center">Subject Code</th>
                                        <th scope="col" class="px-6 py-3 text-center">Subject Name</th>
                                        <th scope="col" class="px-6 py-3 text-center">Section</th>
                                        <th scope="col" class="px-6 py-3 text-center">Finals Unlock All</th>
                                        <th scope="col" class="px-6 py-3 text-center">Finals Unlock One</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 text-center"><?php echo $row['subject_code']; ?></td>
                                            <td class="px-6 py-4 text-center"><?php echo $row['subject_name']; ?></td>
                                            <td class="px-6 py-4 text-center"><?php echo $row['section']; ?></td>
                                            <td class="px-6 py-4 text-center">
                                                <form method="POST">
                                                    <button type="submit" name="unlock_all" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Unlock All
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <form method="POST">
                                                    <button type="submit" name="unlock_one" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Unlock One
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <p class="text-center text-gray-500">No records found.</p>
                        <?php } ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
