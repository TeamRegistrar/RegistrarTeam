<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "curriculum_maintenance"; // Make sure this matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data based on order_no
if (isset($_GET['order_no'])) {
    $order_no = $_GET['order_no'];

    // Get current data for this order_no
    $sql = "SELECT * FROM crudforcp WHERE order_no = $order_no";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    // If no order_no is passed, redirect to the main page
    header("Location: courseProgram.php");
    exit();
}

// Handle form submission for updating the record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Get the updated course details from the form
    $course_code = $_POST['course_code'];
    $course_name = $_POST['course_name'];

    // Update the database with new values
    $update_sql = "UPDATE crudforcp SET course_code='$course_code', course_name='$course_name' WHERE order_no=$order_no";

    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: courseProgram.php"); // Redirect to courseProgram.php after successful update
        exit();
    } else {
        echo "Error: " . $update_sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course Program</title>
    <!-- Load Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-6 ">Edit Course Program</h2>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?order_no=' . $order_no; ?>">

        <div class="mb-4">
            <label for="course_code" class="block text-sm font-medium text-gray-700">Course Program Code</label>
            <input type="text" name="course_code" id="course_code" value="<?php echo $row['course_code']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required />
        </div>

        <div class="mb-4">
            <label for="course_name" class="block text-sm font-medium text-gray-700">Course Program Name</label>
            <input type="text" name="course_name" id="course_name" value="<?php echo $row['course_name']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required />
        </div>

        <div class="flex justify-center">
    <button type="submit" name="update" class="text-white bg-green-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
        Update
    </button>
</div>

    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
