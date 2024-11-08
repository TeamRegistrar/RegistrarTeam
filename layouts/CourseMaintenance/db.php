<?php
$servername = "localhost"; // or kung saan hosted ang MySQL server
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "cmregistrar"; // Pangalan ng database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>