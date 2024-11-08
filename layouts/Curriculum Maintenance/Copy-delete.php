<?php
// Define the current page
$current_page = 'Copy - Delete'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Copy - Delete' => '/rescmreg/layouts/Curriculum Maintenance/Copy-delete.php' 
];
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
    <!-- Navbar placeholder -->
    <div id="navbar-placeholder"></div>

    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">
       

          <!-- Form section -->

    <section class="form-section mb-5 p-5 bg-white shadow-md rounded-lg mt-10">
    <form>
        <div class="grid gap-6 mb-6 md:grid-cols-1">
            <div>
                <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Course</label>
                <select id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Select Course.</option>
                    <option value="order3">Course 1</option>
                    <option value="order3">Course 2</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            

            <div class="grid gap-5 mb-1 md:grid-cols-1">

                <h1 class="text-center  pt-8 font-semibold">Curriculum Year</h1>



                <div>
                    <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center"></label>
                    <select id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="" disabled selected>Select Major </option>
                        <option value="order3">Major 1</option>
                        <option value="order3">Major 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <div class="grid gap-0 mb-6 md:grid-cols-3">
                    <div>
                        <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Year</label>
                        <select id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" disabled selected>Select Year</option>
                            <option value="order3">Year 1</option>
                            <option value="order3">Year 2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    
                    <h1 class="text-center  pt-8 font-semibold">To</h1>


                    <div>
                        <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Major</label>
                        <select id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" disabled selected>Select Major</option>
                            <option value="order3">Major 1</option>
                            <option value="order3">Major 2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

    </form>
</section>

<section class="form-section mb-10 p-5 bg-white shadow-md rounded-lg mt-5">
    <form>
            <div class="grid gap-10 mb-2 md:grid-cols-1">

                <h1 class="text-center  pt-8 font-semibold">Operation</h1>



                <div>
                    <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center"></label>
                    <select id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="" disabled selected>Copy Curriculum </option>
                        <option value="order3">Curriculum 1</option>
                        <option value="order3">Curriculum 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <div class="grid gap-0 mb-6 md:grid-cols-3">
                    <div>
                        <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Year</label>
                        <select id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" disabled selected>Select Year</option>
                            <option value="order3">Year 1</option>
                            <option value="order3">Year 2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    
                    <h1 class="text-center  pt-8 font-semibold">To</h1>


                    <div>
                        <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Major</label>
                        <select id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" disabled selected>Select Major</option>
                            <option value="order3">Major 1</option>
                            <option value="order3">Major 2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
    </form>
</section>

<div class="flex items-center justify-center md:col-span-1 pb-10"> <!-- Center the button within its column -->
    <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-3 flex items-center justify-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 max-w-sm pl-20 pr-20"> <!-- Increased padding and max-w-sm -->
        <i class="fas fa-arrow-left mr-2"></i> <!-- Save icon -->
        Return
    </button>
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

