<?php
// Define the current page
$current_page = 'Modification of Data'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Modification of Data' => '/rescmreg/layouts/StudentMainRecord/Modification/modification.php' 
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* General Styles */
        body {
            margin-left: 50px;
            margin-right: 50px;
            font-family: Arial, sans-serif;
            margin-top: 55px;
            margin-bottom: 55px;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .search-section {
            background: white;
            padding: 40px 60px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .label {
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
        }

        .student-id-input {
            width: 50%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        .proceed-button {
            background-color: #002855;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            width: 53%;
            transition: background-color 0.3s ease;
        }

        .proceed-button:hover {
            background-color: #0056a3;
        }

        .student-info {
            background: white;
            padding: 30px 60px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .info-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 20px;
            flex-wrap: wrap;
        }

        .student-details,
        .academic-details {
            flex: 1;
        }

        .student-details p,
        .academic-details p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .print-button,
        .history-button {
            background: none;
            border: none;
            cursor: pointer;
            color: #333;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .info-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            padding-top: 20px;
        }

        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card .icon {
            font-size: 24px;
            display: block;
            margin-bottom: 10px;
        }

        .card p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
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
            color: #FFA500; /* Mustard yellow color */
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

    <div class="container">
        <div class="search-section">
            <label for="student-id" class="label">Student ID</label>
            <input id="student-id" type="text" placeholder="Enter Student ID" class="student-id-input">
            <button class="proceed-button">Proceed</button>
        </div>

        <div class="student-info">
            <div class="info-header">
                <div class="student-details">
                    <p>Student ID: <strong><?php echo "12-3457-890"; ?></strong></p>
                    <p>Student Name: <strong><?php echo "Jhon Doe"; ?></strong></p>
                    <p>Curriculum Year:</p>
                </div>
                <div class="academic-details">
                    <p>Major:</p>
                    <p>Year Level/Term:</p>
                    <p>Academic Year:</p>
                </div>
                <div class="actions">
                    <button class="print-button">🖨 Print</button>
                    <a href="changeHistory.php" class="history-button">📝 View history</a>
                </div>
            </div>
            <div class="info-cards">
                <a href="personalDetails.php" class="card">
                    <i class="fa-regular fa-pen-to-square icon"></i>
                    <p>Personal Data</p>
                </a>
                <a href="alienStatus.php" class="card">
                    <i class="fa-regular fa-pen-to-square icon"></i>
                    <p>Alien Status</p>
                </a>
                <a href="residenceStatus.php" class="card">
                    <i class="fa-regular fa-pen-to-square icon"></i>
                    <p>Residence Status Data</p>
                </a>
                <a href="physicalDesc.php" class="card">
                    <i class="fa-regular fa-pen-to-square icon"></i>
                    <p>Physical Description</p>
                </a>
                <a href="familyData.php" class="card">
                    <i class="fa-regular fa-pen-to-square icon"></i>
                    <p>Family Data</p>
                </a>
                <a href="educationalBg.php" class="card">
                    <i class="fa-regular fa-pen-to-square icon"></i>
                    <p>Education Background</p>
                </a>
                <a href="genQualification.php" class="card">
                    <i class="fa-regular fa-pen-to-square icon"></i>
                    <p>General Qualification</p>
                </a>
                <a href="qualification.php" class="card">
                    <i class="fa-regular fa-pen-to-square icon"></i>
                    <p>Qualification</p>
                </a>
            </div>
        </div>
    </div>
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
