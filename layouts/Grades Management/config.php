<?php
$servername = "localhost"; // Localhost
$username = "root";        // PHPMyAdmin username
$password = "";            // PHPMyAdmin password
$dbname = "grades_db";     // DatabaseName
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>