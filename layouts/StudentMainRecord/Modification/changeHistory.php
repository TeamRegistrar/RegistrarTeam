<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - Edit History</title>
    <link rel="stylesheet" href="changeHistory.css">
</head>
<body>
    <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php">Modification of Data</a>
    <span>&gt;</span>
    <span class="current-page">View History</span>
</div>

    <div class="header">
        <h2>Modification of Data - Edit History</h2>
    </div>

    <div class="container">
        <div class="search-filter-section">
            <div class="search-group">
                <input type="text" placeholder="Search" class="search-input">
                <button class="search-button">SEARCH</button>
            </div>
            <div class="filter-dropdown">
                <button class="filter-button">FILTER ▼</button>
                <div class="dropdown-content">
                    <a href="#">Name</a>
                    <a href="#">Date</a>
                    <a href="#">Ascending</a>
                    <a href="#">Descending</a>
                </div>
            </div>
        </div>

        <table class="edit-history-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Description / Changes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Example data; replace with actual database query or dynamic content as needed.
                    $historyData = [
                        ['date' => '2024-10-01', 'id' => 'EMP12345', 'name' => 'John Smith', 'description' => 'Updated student personal data.']
                    ];

                    foreach ($historyData as $entry) {
                        echo "<tr>";
                        echo "<td>{$entry['date']}</td>";
                        echo "<td>{$entry['id']}</td>";
                        echo "<td>{$entry['name']}</td>";
                        echo "<td>{$entry['description']}</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <div class="form-actions">
            <button class="back-button">BACK</button>
        </div>
    </div>
    <script>
         // Breadcrumb handling based on navigation
    document.addEventListener('DOMContentLoaded', function() {
        const breadcrumb = document.getElementById('breadcrumb');
        const referrer = document.referrer;

       // Check if navigated from Course Maintenance
       if (referrer.includes('modification.php')) {
            // Breadcrumb already shows "Update Category"
        } else {
            // Adjust breadcrumb if accessed directly or from elsewhere
            breadcrumb.innerHTML = '<a href="/rescmreg/layouts/home.php">Home</a>';
        }
    });

    </script>
</body>
</html>
