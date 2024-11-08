<?php 
include 'db.php';

// Initialize variables
$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
$sortBy = isset($_POST['sort']) ? $_POST['sort'] : 'Date'; // Default sort by Date
$order = isset($_POST['order']) && $_POST['order'] === 'descending' ? 'DESC' : 'ASC'; // Default order ascending

// Build the SQL query
$sql = "SELECT Date, employee_id, Name, Description FROM coursehistory WHERE 1=1";

if ($searchTerm) {
    $searchTermEscaped = $conn->real_escape_string($searchTerm);
    
    // Convert the search term to different date formats
    $sql .= " AND (STR_TO_DATE(Date, '%Y-%m-%d') = STR_TO_DATE('$searchTermEscaped', '%Y-%m-%d') OR 
                   STR_TO_DATE(Date, '%M %d, %Y') = STR_TO_DATE('$searchTermEscaped', '%M %d, %Y') OR 
                   STR_TO_DATE(Date, '%d/%m/%Y') = STR_TO_DATE('$searchTermEscaped', '%d/%m/%Y') OR
                   employee_id = '$searchTermEscaped' OR 
                   Name LIKE '%$searchTermEscaped%')";
}

$sql .= " ORDER BY $sortBy $order";

$result = $conn->query($sql);

if (!$result) {
    die("Error in SQL query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 0;
            height: 100vh;
            display: flex;
        }
        .container {
            background-color: white;
            padding: 20px;
            margin: 60px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        h3 {
            margin-top: 40px;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px; 
            text-align: left;
            border: 1px solid #ddd;
            vertical-align: top; 
        }
        th {
            background-color: #17416A;
            color: white;
            text-align: center; 
        }
        td {
            background-color: #f9f9f9;
        }
        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .return-btn, .filter-container button {
            padding: 10px 20px;
            background-color: #17416A;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 10px;
        }
        .return-btn:hover, .filter-container button:hover {
            background-color: #3263AD;
        }
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .search-container .search-box {
            display: flex;
        }
        .search-container input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;
        }
        .search-container button {
            padding: 8px;
            border: 1px solid #ccc;
            background-color: #17416A;
            color: white;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            outline: none;
        }
        .search-container button:hover {
            background-color: #3263AD;
        }
        .filter-container {
            display: flex;
            align-items: center;
            position: relative;
        }
        .filter-container .filter-options {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
            flex-direction: column;
        }
        .filter-container:hover .filter-options {
            display: flex;
        }
        .filter-options {
            display: flex;
            flex-direction: column;
            align-items: flex-start; 
        }

        .filter-options label {
            margin-bottom: 3px;
        }
        .filter-options button {
            margin-top: 5px; /* Space above the button */
            padding: 8px 12px; /* Padding for the button */
            background-color: #17416A; /* Button background */
            color: white; /* Text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
        }

        .filter-options button:hover {
            background-color: #3263AD; /* Darker shade on hover */
        }
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
    </style>
    <script>
        function toggleFilterOptions() {
            const filterOptions = document.querySelector('.filter-options');
            filterOptions.style.display = filterOptions.style.display === 'flex' ? 'none' : 'flex';
        }
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
</head>
<body>
    <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/CourseMaintenance/course-maintenance.php">Course Maintenance</a>
    <span>&gt;</span>
    <span class="current-page">View History</span>
</div>

<div class="container">
    <h3>Change History</h3>
    <div class="search-container">
        <form method="POST">
            <div class="search-box">
                <input type="text" name="search" placeholder="Search by Date, Employee ID, or Name" value="<?= htmlspecialchars($searchTerm) ?>">
                <button type="submit">🔍</button>
            </div>
        </form>
        <div class="filter-container">
            <button onclick="toggleFilterOptions()">Filter Options</button>
            <div class="filter-options">
                <form method="POST">
                    <label><input type="radio" name="sort" value="Name" <?= $sortBy === 'Name' ? 'checked' : '' ?>> Name</label>
                    <label><input type="radio" name="sort" value="Date" <?= $sortBy === 'Date' ? 'checked' : '' ?>> Date</label>
                    <label><input type="radio" name="order" value="ascending" <?= $order === 'ASC' ? 'checked' : '' ?>> Ascending</label>
                    <label><input type="radio" name="order" value="descending" <?= $order === 'DESC' ? 'checked' : '' ?>> Descending</label>
                    <button type="submit">Apply</button>
                    <input type="hidden" name="search" value="<?= htmlspecialchars($searchTerm) ?>"> <!-- Preserve search term -->
                </form>
            </div>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['Date']) ?></td>
                <td><?= htmlspecialchars($row['employee_id']) ?></td>
                <td><?= htmlspecialchars($row['Name']) ?></td>
                <td><?= htmlspecialchars($row['Description']) ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <div class="button-container">
        <button onclick="window.location.href='/rescmreg/layouts/CourseMaintenance/course-maintenance.php'" class="return-btn">Return</button>
    </div>
</div>
</body>
</html>

<?php $conn->close(); ?>
