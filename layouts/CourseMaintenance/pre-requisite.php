<?php
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

// Retrieve values from query parameters
$subjectCode = isset($_GET['subjectCode']) ? $_GET['subjectCode'] : '';
$subjectCategory = isset($_GET['subjectCategory']) ? $_GET['subjectCategory'] : '';
$subjectTitle = isset($_GET['subjectTitle']) ? $_GET['subjectTitle'] : '';

// Fetch all courses for the dropdown (use the same table as in course-maintenance.php)
$sql_courses = "SELECT CourseID, CourseCode, CourseTitle FROM courses";  // Change table name as needed
$result_courses = $conn->query($sql_courses);

// Fetch pre-requisite subjects with filter logic
$preRequisites = [];
$subjectCodeFilter = isset($_POST['subjectCodeFilter']) ? $_POST['subjectCodeFilter'] : '';
$sql_prereq = "SELECT PreRequisiteCode, PreRequisiteTitle, IsCoRequisite FROM PreRequisites WHERE PreRequisiteCode LIKE '$subjectCodeFilter%'";
$result_prereq = $conn->query($sql_prereq);

if ($result_prereq === false) {
    echo "Error: " . $conn->error;
} else {
    if ($result_prereq->num_rows > 0) {
        while ($row = $result_prereq->fetch_assoc()) {
            $preRequisites[] = $row;
        }
    }
}

// Add new pre-requisite entry
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addEntry'])) {
    $preReqSubject = $_POST['preReqSubject'];
    $yearLevel = $_POST['yearLevel'];
    $isCoReq = isset($_POST['isCoReq']) ? 1 : 0;

    if (!empty($preReqSubject) && !empty($yearLevel)) {
        $stmt = $conn->prepare("INSERT INTO PreRequisites (PreRequisiteCode, PreRequisiteTitle, PreRequisiteYrLevel, IsCoRequisite) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $preReqSubject, $yearLevel, $isCoReq);
        $stmt->execute();
        $stmt->close();
        
        // Refresh the page to show the new entry
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Delete pre-requisite entry
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteEntry'])) {
    $codeToDelete = $_POST['deleteCode'];

    if (!empty($codeToDelete)) {
        $stmt = $conn->prepare("DELETE FROM PreRequisites WHERE PreRequisiteCode = ?");
        $stmt->bind_param("s", $codeToDelete);
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
    <title>Subject Pre-Requisite Maintenance</title>
    <link rel="stylesheet" href="/rescmreg/css/prerequisite.css">
</head>
<body>

    <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/CourseMaintenance/course-maintenance.php">Course Maintenance</a>
    <span>&gt;</span>
    <span class="current-page">Pre - Requisite</span>
</div>

    <div class="container">
        <div class="header">
            <a href="/rescmreg/layouts/CourseMaintenance/course-maintenance.php">
                <img src="/rescmreg/images/go-back.png" alt="Go Back" class="go-back-button">
            </a>
        </div>
        <h3>Course Maintenance - Pre Requisite</h3>
        <div class="subject-info">
            <label>Subject Code:</label>
            <input type="text" value="<?= htmlspecialchars($subjectCode) ?>" readonly><br>
            <label>Subject Category:</label>
            <input type="text" value="<?= htmlspecialchars($subjectCategory) ?>" readonly><br>
            <label>Subject Title:</label>
            <input type="text" value="<?= htmlspecialchars($subjectTitle) ?>" readonly>
        </div>
        <div class="filter-section">
            <form method="POST" class="filter-form">
                <button type="submit" name="refreshList" class="refresh-button">Refresh</button>
                <label>To filter subject display enter subject code starts with</label>
                <input type="text" name="subjectCodeFilter" id="subjectCodeFilter" value="<?= htmlspecialchars($subjectCodeFilter) ?>">
            </form>
        </div>
        <div class="form-section">
            <form method="POST">
                <div class="preReq-row">
                    <label for="preReqSubject">Pre-requisite subject(s):</label>
                    <input type="text" name="preReqSubject" id="preReqSubject" class="preReq-input" placeholder="Enter subject code to scroll the list">
                </div>
                <div class="preReq-dropdown">
                    <select name="preReqDropdown" id="preReqDropdown">
                        <option value="">N/A</option>
                        <?php while ($course = $result_courses->fetch_assoc()) : ?>
                            <option value="<?= htmlspecialchars($course['CourseID']) ?>">
                                <?= htmlspecialchars($course['CourseCode'] . " - " . $course['CourseTitle']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="row">
                    <label for="yearLevel">Pre-requisite year level standing:</label>
                    <select name="yearLevel" id="yearLevel">
                        <option value="">N/A</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                        <option value="4">5th Year</option>
                        <option value="4">6th Year</option>
                    </select>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" name="isCoReq" id="isCoReq">
                    <label for="isCoReq">Is Co-Requisite?</label>
                </div>
                <button type="submit" name="addEntry" class="add-button">Add</button>
            </form>
        </div>
        <hr>
        <div class="title-container">
            <h3>EXISTING PRE-REQUISITE COURSES FOR: <?= htmlspecialchars($subjectCode) ?></h3>
        </div>
        <div class="table-section">
            <table class="elective-table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Title</th>
                        <th>Is Co-requisite</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($preRequisites as $preReq) : ?>
                        <tr>
                            <td><?= htmlspecialchars($preReq['PreRequisiteCode']) ?></td>
                            <td><?= htmlspecialchars($preReq['PreRequisiteTitle']) ?></td>
                            <td><?= $preReq['IsCoRequisite'] ? 'Yes' : 'No' ?></td>
                            <td class="delete-cell">
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="deleteCode" value="<?= htmlspecialchars($preReq['PreRequisiteCode']) ?>">
                                    <button type="submit" name="deleteEntry" class="delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
