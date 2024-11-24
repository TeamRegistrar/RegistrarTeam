<?php
// Define the current page
$current_page = 'Colleges'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Colleges' => '/rescmreg/layouts/Curriculum Maintenance/Colleges.php' 
];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "curriculum_maintenance"; // Make sure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for saving a new record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    // Get the course details from the form
    $course_code = $_POST['course_code'];
    $course_name = $_POST['course_name'];

    // Get the latest order number and increment it
    $sql = "SELECT MAX(order_no) AS max_order FROM crudforcp";
    $result = $conn->query($sql);
    $max_order = 0; // Default value if no rows exist
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $max_order = $row['max_order'];
    }
    $order_no = $max_order + 1; // Increment the order number

    // Insert data into the database
    $sql = "INSERT INTO crudforcp (order_no, course_code, course_name) VALUES ('$order_no', '$course_code', '$course_name')";

    if ($conn->query($sql) === TRUE) {
        // Set success message
        $success_message = "New record created successfully";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Handle delete request when clicking "Remove"
if (isset($_GET['delete_order_no'])) {
    $order_no_to_delete = $_GET['delete_order_no'];

    // Delete the course program from the database
    $delete_sql = "DELETE FROM crudforcp WHERE order_no = $order_no_to_delete";
    
    if ($conn->query($delete_sql) === TRUE) {
        // Set success message (red color)
        $success_message = "<div class='text-red-600 text-center mb-4'>Record deleted successfully</div>";
    } else {
        $error_message = "Error: " . $delete_sql . "<br>" . $conn->error;
    }
}

// Retrieve data from the database
$sql = "SELECT * FROM crudforcp";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applicant</title>
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
            color: #FFA500;; /* Mustard yellow color */
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
        <?php 
        $breadcrumbCount = count($breadcrumbs);
        $currentIndex = 0;

        foreach ($breadcrumbs as $title => $link): 
            $currentIndex++;
            if ($title === $current_page): ?>
                <span class="current-page"><?= htmlspecialchars($title) ?></span>
            <?php else: ?>
                <a href="<?= $link ?>"><?= htmlspecialchars($title) ?></a>
            <?php endif; ?>
            <?php if ($currentIndex < $breadcrumbCount): ?>
                <span>&gt;</span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">
        <!-- Form section -->
        <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="college_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">College code</label>
                        <input type="text" name="college_code" id="college_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input College code" required />
                    </div>

                    <div>
                        <label for="college_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">College name</label>
                        <input type="text" name="college_name" id="college_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input College name" required />
                    </div>

                    <div>
                        <label for="dean" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Dean</label>
                        <input type="text" name="dean" id="dean" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input name of dean" required />
                    </div>
                </div>

                <!-- Display error or success messages -->
                <?php if (isset($error_message)) { ?>
                    <div class="text-red-600 text-center mb-4"><?php echo $error_message; ?></div>
                <?php } elseif (isset($success_message)) { ?>
                    <div class="<?php echo $success_message_color; ?> text-center mb-4"><?php echo $success_message; ?></div>
                <?php } ?>

                <!-- Save and buttons -->
                <section class="flex justify-between items-start mb-12 w-full">
                    <!-- Column 1 -->
                    <div class="flex flex-col w-full max-w-2xl px-4 mb-4">
                        <button type="submit" name="save" class="mb-4 text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fa-regular fa-floppy-disk mr-2"></i> Save Entry Changes
                        </button>
                    </div>

                    <!-- Column 2 -->
                    <div class="flex flex-col w-full max-w-2xl px-4 mb-4">
                        <button type="button" class="mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fas fa-print mr-2"></i> Print
                        </button>
                    </div>

                    <!-- Column 3 -->
                    <div class="flex flex-col w-full max-w-2xl px-4 mb-4">
                        <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fas fa-history mr-2"></i> View History
                        </button>
                    </div>
                </section>
            </form>
        </section>

        <!-- Table section -->
        <section class="table-section p-6 bg-white shadow-md rounded-lg">
            <h2 class="text-lg font-semibold text-gray-900 mb-6 text-center">List of Colleges</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr style="background-color: #012D5E; color: white;">
                            <th scope="col" class="px-6 py-3 text-center">College code</th>
                            <th scope="col" class="px-6 py-3 text-center">College name</th>
                            <th scope="col" class="px-6 py-3 text-center">College dean</th>
                            <th scope="col" class="px-6 py-3 text-center">Edit & Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 text-center"><?php echo $row['college_code']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['college_name']; ?></td>
                                <td class="px-6 py-4 text-center"><?php echo $row['dean']; ?></td>
                                <td class="px-6 py-4 text-center">

                                <a href="edit_college.php?college_code=<?php echo $row['college_code']; ?>" class="font-medium text-blue-600 hover:text-blue-800 mr-4">Edit</a>


                                <a href="?delete_id=<?php echo $row['id']; ?>" class="font-medium text-red-600 hover:text-red-800">Remove</a>
                                </td>
                            </tr>
                        <?php } ?>
            </tbody>
        </table>
    </div>
</section>    
<script>
             document.addEventListener('DOMContentLoaded', function() {
        // Select the breadcrumb container
        const breadcrumbContainer = document.querySelector('.breadcrumbs');

        // Add event listener to 'Update' button to add breadcrumb item
        document.querySelector('.change-btn[data-breadcrumb]').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the breadcrumb name from the data attribute
            const breadcrumbName = this.getAttribute('data-breadcrumb');

            // Generate the new breadcrumb item
            const newBreadcrumb = `<a href="${this.href}">${breadcrumbName}</a>`;

            // Append new breadcrumb to container with separator
            breadcrumbContainer.innerHTML += ` &gt; ${newBreadcrumb}`;

            // Redirect to the actual link after updating the breadcrumb
            setTimeout(() => {
                window.location.href = this.href;
            }, 100); // Small delay to visually update breadcrumbs first
        });
    });
    </script>    
</body>
</html> 
<?php
$conn->close();
?>
