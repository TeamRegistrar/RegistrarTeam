<?php
// Define the current page
$current_page = 'Department With Colleges'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Department With Colleges' => '/rescmreg/layouts/Curriculum Maintenance/DepartmentWithColleges.php' 
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

    <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
    <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Department code</label>
                <input type="text" id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input Department code" required />
            </div>

            <div>
                <label for="course_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Department head</label>
                <input type="text" id="course_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input department head" required />
            </div>

            <div>
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Department name</label>
                <input type="text" id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input department name" required />
            </div>

            <div>
                <div>
                    <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Under College of</label>
                    <select id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="" disabled selected>Select under college</option>
                        <option value="computer_science">Computer Science</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>            

        </div>
    </form>
</section>

<!--Buttons-->

<section class="flex justify-between items-start mb-12 w-full"> 
    <div class="flex flex-col w-full max-w-2xl px-4"> <!-- First column -->
        <button type="button" class="mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="fa-regular fa-floppy-disk mr-2"></i> <!-- Save icon -->
            Save Entry Changes
        </button>
        
        <button type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
            <i class="fas fa-edit mr-2"></i> <!-- Edit icon -->
            Edit
        </button>
    </div>

    <div class="flex flex-col w-full max-w-2xl px-4"> <!-- Second column -->
        <button type="button" class="mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="fas fa-print mr-2"></i> <!-- Print icon -->
            Print
        </button>

        <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <i class="fas fa-history mr-2"></i> <!-- History icon -->
            View History
        </button>
    </div>
</section>



 <!-- Table section -->


 <section class="table-section p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold text-gray-900 mb-6 text-center">List of Departments</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             
                <tr style="background-color: #012D5E; color: white;">
                    <th scope="col" class="px-6 py-3 text-center">Department code</th>
                    <th scope="col" class="px-6 py-3 text-center">Department name</th>
                    <th scope="col" class="px-6 py-3 text-center">Department head</th>
                    <th scope="col" class="px-6 py-3 text-center">College name</th>

                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">Oed</th>
                    <td class="px-6 py-4 text-center">Distance Education</td>
                    <td class="px-6 py-4 text-center">Head name</td>
                    <td class="px-6 py-4 text-center">Online Education</td>

                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">NSTP-LTS</th>
                    <td class="px-6 py-4 text-center">LTS</td>
                    <td class="px-6 py-4 text-center">Head name</td>
                    <td class="px-6 py-4 text-center">National Program Service</td>

                    
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">NSTP-LTS</th>
                    <td class="px-6 py-4 text-center">LTS</td>
                    <td class="px-6 py-4 text-center">Head name</td>
                    <td class="px-6 py-4 text-center">National Program Service</td>
                </tr>
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

