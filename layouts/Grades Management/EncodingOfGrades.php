<?php
// Define the current page
$current_page = 'Encoding of Grades'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Encoding of Grades' => '/rescmreg/layouts/Grades Management/EncodingOfGrades.php' 
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades Status Form</title>

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
    <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Encoding Of Grades</h1>



        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex flex-col items-center">
                <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Term</label>
                <select id="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1st Year">1st Year</option>
                </select>
            </div>
        
            <div class="flex flex-col items-center">
                <label for="startYear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Start Year</label>
                <input type="number" id="startYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        
            <div class="flex flex-col items-center">
                <label for="endYear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">End Year</label>
                <input type="number" id="endYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>


             <!--Check box container-->
        <h2 class="text-2xl font-bold text-center mb-4">Grades Status For</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-10">
            <div class="flex items-center justify-center">
                <input type="radio" id="show-all-not-verified" name="grades-status" value="show-all-not-verified">
                <label for="show-all-not-verified" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Show All Not Verified</label>
            </div>
        
            <div class="flex items-center justify-center">
                <input type="radio" id="show-all-verified" name="grades-status" value="show-all-verified">
                <label for="show-all-verified" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Show All Verified</label>
            </div>
        
            <div class="flex items-center justify-center">
                <input type="radio" id="grades-encoded" name="grades-status" value="grades-encoded">
                <label for="grades-encoded" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Grades Encoded</label>
            </div>
        
            <div class="flex items-center justify-center">
                <input type="radio" id="grades-not-encoded" name="grades-status" value="grades-not-encoded">
                <label for="grades-not-encoded" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Grades Not Encoded</label>
            </div>
        </div>
        
        <div class="text-center mt-20">
            <a href="GradeStatus.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >Proceed</a>
        </div>
    </section>
    
    <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-bold text-center mt-10 mb-4">College</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="college" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter College</label>
                <input type="text" id="college" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div>
                <label for="employee-id-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee ID/Name</label>
                <input type="text" id="employee-id-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="GradeStatus.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >Proceed</a>
        </div>

        <div class="text-center mt-6">
            <a href="SetEncodingGrades.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >Set Encoding Date</a>
        </div>
        </section>
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