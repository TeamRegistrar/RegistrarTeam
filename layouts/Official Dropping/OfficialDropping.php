<?php
// Define the current page
$current_page = 'Official Dropping'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Official Dropping' => '/rescmreg/layouts/Official Dropping/OfficialDropping.php' 
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
    <link rel="stylesheet" href="breadcrumbs.css">
    <style>
    .section-header {
        background-color: #174069;
        padding: 10px;
        text-align: center;
        margin-bottom: 10px;
    }

    .section-header h3 {
        color: white;
        font-size: 24px;
        margin: 0;
    }
    </style>

    <!-- javascript connected to navbar.js on components folder -->

    
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

    <section class="section-header mb-6 mt-14">
            <h3 class="text-2xl font-semibold">Official Transcript of Records</h3>
        </section>

          <!-- Form section -->

          <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
            <form>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="order_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Student Number</label>
                        <input type="text" id="order_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input Student number" required />
                    </div>
                
                    <div>
                        <div>
                            <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Subject</label>
                            <select id="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" disabled selected>Select subject</option>
                                <option value="computer_science">Computer Science</option>
                            </select>
                        </div>
                    </div> 
                </div>
            </form>
        </section>
        

        

<!--Buttons-->

<section class="flex items-center justify-center">
    <div class="grid mb-6 md:grid-cols-1 gap-5">
        <!-- Include not offered button -->
        <button type="button" class="w-48 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <i class="fas fa-search"></i> <!-- Save icon -->
           Search
        </button>
    </div>
</section>




 <!-- Table section -->


 <section class="table-section p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold text-gray-900 mb-6 text-center">List Of Subject Enrolled</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             
                <tr style="background-color: #012D5E; color: white;">
                    <th scope="col" class="px-6 py-3 text-center">Subject Code</th>
                    <th scope="col" class="px-6 py-3 text-center">Subject Title</th>
                    <th scope="col" class="px-6 py-3 text-center">Subject Drop </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"></th>
                    <td class="px-6 py-4 text-center"> </td>
                    <td class="px-6 py-4 text-center"></td>
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"></th>
                    <td class="px-6 py-4 text-center"></td>
                    <td class="px-6 py-4 text-center"></td>
                    
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"></th>
                    <td class="px-6 py-4 text-center"></td>
                    <td class="px-6 py-4 text-center"></td>
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

