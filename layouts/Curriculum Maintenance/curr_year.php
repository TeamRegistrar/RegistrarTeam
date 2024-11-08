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
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/Curriculum Maintenance/CoursesCurriculum.php">Curriculum Maintenance</a>
    <span>&gt;</span>
    <span class="current-page">Curriculum Year</span>
</div>

<div id="navbar-placeholder"></div>

<!-- Main content -->
<div class="main-content p-6" id="mainContent">
    
 <!-- Title Section -->

 <form>
    <div class="pt-10 "> <!-- Adjust the number to increase or decrease padding -->
       <h1 class="text-center font-semibold">Select a course Curriculum year information</h1>
    </div>
 </form>

<!-- Form section input -->

<section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
    <form>
        <div class="grid gap-0 mb-5 md:grid-cols-3">
            <div>
                <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center"></label>
                <input type="text" id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
            
            <h1 class="text-center pt-5 font-semibold">To</h1>

            <div>
                <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center"></label>
                <input type="text" id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
        </div>

        <!-- Centered "Existing Curriculum Year" -->
        <div class="md:col-span-3 text-center mb-5">
            <h1 class="text-center font-semibold">
                Existing Curriculum Year 
                <span> <br>
                    <a href="link-to-2015-2016" class="text-blue-500 hover:underline">(2015-2016)</a> 
                    <a href="link-to-2018-2019" class="text-blue-500 hover:underline">(2018-2019)</a>
                </span>
            </h1>
        </div>
    </form>
</section>

<!--Buttons-->

<section class="flex justify-center items-center">
    <div class="grid gap-20 mb-6 md:grid-cols-2">
        <!-- Button with a link to view complete curriculum -->
        <a href="#" class="w-full">
            <button type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <i class="fas fa-search"></i> <!-- Magnifying glass icon -->
                View complete curriculum OR
            </button>
        </a>

        <!-- Button with a link to reload the page -->
        <a href="curr_year.php" class="w-full">
            <button type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <i class="fas fa-sync-alt"></i> <!-- Refresh icon -->
                Reload page
            </button>
        </a>
    </div>
</section>


<!-- Another input section -->

<section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10 pb-10">
    <form>
        <div class="grid gap-10 pr-10 mb-6 md:grid-cols-2">
            <div>
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center"></label>
                <select id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Select Year</option>
                    <option value="1year">1st year</option>
                    <!-- Add more options as needed -->
                </select>
            </div>


            <div>
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center"></label>
                <select id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Select Term</option>
                    <option value="1term ">1st term</option>
                    <!-- Add more options as needed -->
                </select>
            </div>


    </form>
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

