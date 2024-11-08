<?php
// Define the current page
$current_page = 'Subject Without Credit Unit'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Subject Without Credit Unit' => '/rescmreg/layouts/Curriculum Maintenance/SubjectWithoutCredit.php' 
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
        <div class="grid gap-6 mb-6 md:grid-cols-1">
            <div>
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Subject List</label>
                <select id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Select Subject</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            
            <div class="grid gap-2 mb-6 md:grid-cols-3">
                <div>
                    <label for="Credit_lec_unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credit Lec Unit:</label>
                    <input type="text" id="Credit_lec_unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input Lec unit" required />
                </div>
                <div>
                    <label for="Credit_lab_unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credit Lab unit:</label>
                    <input type="text" id="Credit_lab_unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input lab unit" required />
                </div>

                <!-- Add button next to the 'Credit Lab unit' input -->
                <div class="flex items-center justify-start md:col-span-1 pt-6"> <!-- Keep the button in its own column -->
                    <button type="button" class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-3 flex items-center justify-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full ">
                        <i class="fa-regular fa-floppy-disk mr-2"></i> <!-- Save icon -->
                        Add Entry
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>


<!--Buttons-->





 <!-- Table section -->


 <section class="table-section p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold text-gray-900 mb-6 text-center">List of non-credit subject</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             
                <tr style="background-color: #012D5E; color: white;">
                    <th scope="col" class="px-6 py-3 text-center">Subject code</th>
                    <th scope="col" class="px-6 py-3 text-center">Description</th>
                    <th scope="col" class="px-6 py-3 text-center">Lec credit</th>
                    <th scope="col" class="px-6 py-3 text-center">Lab credit</th>
                    <th scope="col" class="px-6 py-3 text-center">No entry in Curriculum</th>

                     <!-- Add more options as needed -->    

                </tr>

                 <!-- Add more options as needed -->    

            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">500311102</th>
                    <td class="px-6 py-4 text-center">Work With Others</td>
                    <td class="px-6 py-4 text-center">3</td>
                    <td class="px-6 py-4 text-center">0</td>
                    <td class="px-6 py-4 text-center">1(Delete)</td>
                </tr>


                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">500311103</th>
                    <td class="px-6 py-4 text-center">Demonstrate Work Values</td>
                    <td class="px-6 py-4 text-center">3</td>
                    <td class="px-6 py-4 text-center">0</td>
                    <td class="px-6 py-4 text-center">1(Delete)</td>
                </tr>

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">ABM-03-18</th>
                    <td class="px-6 py-4 text-center">Basic Finance</td>
                    <td class="px-6 py-4 text-center">3</td>
                    <td class="px-6 py-4 text-center">0</td>
                    <td class="px-6 py-4 text-center">1(Delete)</td>
                </tr>
                 <!-- Add more options as needed -->    
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

