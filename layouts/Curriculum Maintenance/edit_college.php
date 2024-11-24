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

// Retrieve data based on college_code
if (isset($_GET['college_code'])) {
    $original_college_code = $_GET['college_code'];

    // Get current data for this college_code
    $sql = "SELECT * FROM colleges WHERE college_code = '$original_college_code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the data for editing
        $row = $result->fetch_assoc();
    } else {
        // If the college code is not found, redirect back to the colleges page
        header("Location: Colleges.php");
        exit();
    }
} else {
    // If no college_code is passed, redirect to the main page
    header("Location: Colleges.php");
    exit();
}

// Handle form submission for updating the record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Get the updated college details from the form
    $new_college_code = $_POST['college_code'];
    $college_name = $_POST['college_name'];
    $dean = $_POST['dean'];

    // Update the database with new values
    $update_sql = "UPDATE colleges SET college_code='$new_college_code', college_name='$college_name', dean='$dean' WHERE college_code='$original_college_code'";

    if ($conn->query($update_sql) === TRUE) {
        // Redirect to Colleges.php after successful update
        header("Location: Colleges.php");
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
    <title>Edit College</title>
    <!-- Load Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-6">Edit College</h2>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?college_code=' . $original_college_code; ?>">

        <div class="mb-4">
            <label for="college_code" class="block text-sm font-medium text-gray-700">College Code</label>
            <input type="text" name="college_code" id="college_code" value="<?php echo $row['college_code']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required />
        </div>

        <div class="mb-4">
            <label for="college_name" class="block text-sm font-medium text-gray-700">College Name</label>
            <input type="text" name="college_name" id="college_name" value="<?php echo $row['college_name']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required />
        </div>

        <div class="mb-4">
            <label for="dean" class="block text-sm font-medium text-gray-700">Dean Name</label>
            <input type="text" name="dean" id="dean" value="<?php echo $row['dean']; ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required />
        </div>

        <div class="flex justify-center">
            <button type="submit" name="update" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5">
                Update
            </button>
        </div>

    </form>
</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
