<?php
//problem: magkaroon ng separate list of elective subjects bawat course code
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cmregistrar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch courses for the dropdown
$courses = [];
$sql = "SELECT CourseCode, CourseTitle FROM courses";
$result = $conn->query($sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
} else {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

// Fetch electives from the database
$electives = [];
$sql = "SELECT ElectiveCode, Description FROM electives";
$result = $conn->query($sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $electives[] = $row;
    }
}

// Add new elective to the table
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addElective'])) {
    $subjectCode = $_POST['subjectCode'];  // Read Course Code from the readonly input
    $selectedElective = $_POST['electiveDropdown']; // Use the name of the dropdown

    // Get the Course Title based on the selected elective
    $courseTitle = '';
    foreach ($courses as $course) {
        if ($course['CourseCode'] === $selectedElective) {
            $courseTitle = $course['CourseTitle'];
            break;
        }
    }

    if (!empty($subjectCode) && !empty($courseTitle)) {
        // Add the new elective
        $stmt = $conn->prepare("INSERT INTO electives (ElectiveCode, Description, CourseCode) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $subjectCode, $courseTitle, $selectedElective); // Bind Course Title here

        if ($stmt->execute()) {
            // Successfully added
        } else {
            echo "Error: " . $stmt->error; // Output error if it fails
        }
        $stmt->close();
        
        // Refresh the page to show the new elective
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Delete an elective
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteElective'])) {
    $electiveCode = $_POST['electiveCode'];

    if (!empty($electiveCode)) {
        // Delete the elective
        $stmt = $conn->prepare("DELETE FROM electives WHERE ElectiveCode = ?");
        $stmt->bind_param("s", $electiveCode);
        $stmt->execute();
        $stmt->close();
        
        // Refresh the page to reflect the changes
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elective Courses</title>
    <link rel="stylesheet" href="/rescmreg/css/elective.css">
</head>
<body>
    <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/CourseMaintenance/course-maintenance.php">Course Maintenance</a>
    <span>&gt;</span>
    <span class="current-page">Elective Course Options</span>
</div>

    <div class="container">
        <div class="header">
            <a href="/rescmreg/layouts/coursemaintenance/course-maintenance.php">
                <img src="/rescmreg/images/go-back.png" alt="Go Back" class="go-back-button">
            </a>
        </div>
        <h3>Course Maintenance - Elective Course Options</h3>

        <form method="post">
            <div class="subject-info">
                <label for="subject-code">Course Code: </label>
                <input type="text" id="subject-code" name="subjectCode" readonly>

                <label for="subject-title">Course Title: </label>
                <input type="text" id="subject-title" name="subjectTitle" readonly>

                <label for="subject-category">Course Category: </label>
                <input type="text" id="subject-category" readonly>
            </div>

            <div class="elective-select">
                <label for="elective-input">Elective: </label>
                <input type="text" id="elective-input" placeholder="Search Elective">
                <select id="elective-dropdown" name="electiveDropdown">
                    <option value="">Select an elective</option>
                    <?php foreach ($courses as $course) : ?>
                        <option value="<?= htmlspecialchars($course['CourseCode']) ?>">
                            <?= htmlspecialchars($course['CourseCode'] . ' - ' . $course['CourseTitle']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="buttons">
                <button type="submit" name="addElective" class="add-button">ADD</button>
                <button type="button" class="cancel-button">CANCEL</button>
            </div>
        </form>

        <table class="elective-table">
            <thead>
                <tr>
                    <th>Elective Subject Code</th>
                    <th>Description</th>
                    <th class="delete-cell">Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamically added rows will appear here -->
                <?php foreach ($electives as $elective) : ?>
                    <tr>
                        <td><?= htmlspecialchars($elective['ElectiveCode']) ?></td>
                        <td><?= htmlspecialchars($elective['Description']) ?></td>
                        <td class="delete-cell">
                            <form method="post">
                            <input type="hidden" name="electiveCode" value="<?= htmlspecialchars($elective['ElectiveCode']) ?>">
                            <button type="submit" name="deleteElective" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
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

        document.addEventListener('DOMContentLoaded', function () {
            const courseDetails = JSON.parse(localStorage.getItem('courseDetails'));

            if (courseDetails) {
                document.getElementById('subject-code').value = courseDetails.code || '';
                document.getElementById('subject-title').value = courseDetails.title || '';
                document.getElementById('subject-category').value = courseDetails.category || '';
            }

            // Filter dropdown based on input
            const electiveInput = document.getElementById('elective-input');
            const electiveDropdown = document.getElementById('elective-dropdown');

            electiveInput.addEventListener('input', function () {
                const filter = electiveInput.value.toLowerCase();
                const options = electiveDropdown.options;

                for (let i = 1; i < options.length; i++) {  // Start at index 1 to skip the "Select an elective" option
                    const optionText = options[i].textContent.toLowerCase();
                    options[i].style.display = optionText.includes(filter) ? '' : 'none';
                }
            });
        });
    </script>
</body>
</html>

