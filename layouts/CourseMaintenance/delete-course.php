<?php
session_start();
include 'db.php'; // Ensure this file connects to your database

// Check if course ID is provided via GET
if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    // Prepare the SQL statement to delete the course
    $sql = "DELETE FROM courses WHERE CourseID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $course_id);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        $_SESSION['message'] = "Course deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting course: " . $conn->error;
    }

    // Redirect back to the course maintenance page after deletion
    header("Location: /rescmreg/layouts/CourseMaintenance/course-maintenance.php");
    exit();
} else {
    // Redirect if no course ID is provided
    $_SESSION['message'] = "No course ID provided!";
    header("Location: /rescmreg/layouts/CourseMaintenance/course-maintenance.php");
    exit();
}

$conn->close();
?>
