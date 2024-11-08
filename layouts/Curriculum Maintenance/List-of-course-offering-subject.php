<?php
// Define the current page
$current_page = 'List of Course Offering Subject'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'List of Course Offering Subject' => '/rescmreg/layouts/Curriculum Maintenance/List-of-course-offering-subject.php' 
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
    <!-- javascript connected to navbar.js on components folder -->
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
        <div class="grid gap-6 mb-6 md:grid-cols-1">
            <div>
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Subject Code</label>
                <select id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Equal to</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div>
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Subject Title</label>
                <select id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Equal to</option>
                    <!-- Add more options as needed -->
                </select>
            </div>


        </div>
    </form>
</section>

<!--Buttons-->

<Section class="flex justify-center items-center">
    <div class="grid mb-6 md:grid-cols-1 gap-5"> <!-- Adjusted gap and grid columns -->

        <!-- Include not offered button -->
        <button type="button" class="w-48 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <i class="fas fa  fa-search"></i> <!-- Save icon -->
            Search
        </button>
</Section>



 <!-- Table section -->


 <section class="table-section p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold text-gray-900 mb-6 text-center">List of course offering subject</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             
                <tr style="background-color: #012D5E; color: white;">
                    <th scope="col" class="px-6 py-3 text-center">Subject Code</th>
                    <th scope="col" class="px-6 py-3 text-center">Subject name</th>
                    <th scope="col" class="px-6 py-3 text-center">Course (major)</th>
                    <th scope="col" class="px-6 py-3 text-center">Curriculum yr list</th>
                </tr>
            </thead>


            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">MAT001-18</th> <!--Course code table-->
                    <td class="px-6 py-4 text-center">PRE CALCULUS</td> <!--Course name row-->
                     <td class="px-6 py-4 text-center">Bachelor of Science in Astronomy</td> <!--Course name row-->
                     <td class="px-6 py-4 text-center">2018-2019</td> <!--Course name row-->


                </tr>


               <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"></th> <!--Course code row-->
                    <td class="px-6 py-4 text-center"></td> <!--Course name row--> 
                    <td class="px-6 py-4 text-center">Bachelor of Science in Civil Engineering</td> <!--Course name row-->
                    <td class="px-6 py-4 text-center">2018-2019</td>

                </tr>

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"></th> <!--Course code row-->
                    <td class="px-6 py-4 text-center"></td> <!--Course name row--> 
                    <td class="px-6 py-4 text-center">Bachelor of Science in Civil Engineering</td> <!--Course name row-->
                    <td class="px-6 py-4 text-center">2018-2019</td>
                    
                </tr>

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"></th> <!--Course code row-->
                    <td class="px-6 py-4 text-center"></td> <!--Course name row--> 
                    <td class="px-6 py-4 text-center">Bachelor of Science in Civil Engineering</td> <!--Course name row-->
                    <td class="px-6 py-4 text-center">2018-2019</td>

                    
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

</html> 

