<?php
// Define the current page
$current_page = 'Candidates for Graduation'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Candidates for Graduation' => '/rescmreg/layouts/Reports/candidatesforgrad.php' 
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates for Graduation</title>
    <!-- Load Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Load Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Load Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
    <div class="main-content" id="mainContent">
       

        <section class="section-header mb-6 mt-14">
            <h1 class="text-2xl font-semibold">Candidates for Graduation</h1>
        </section>

        <!-- Form for Student ID and School Year -->
        <div class="bg-white p-8 rounded shadow-md flex flex-col items-center mt-10">
            <!-- Student ID Section -->
            <div class="mb-6 w-96">
                <label for="studentId" class="text-gray-700 text-sm font-semibold block mb-1">Student ID</label>
                <input type="text" id="studentId" placeholder="e.g xx-xxxxx-xxx" class="border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-6 w-96">
                <label for="schoolYearStart" class="text-gray-700 text-sm font-semibold block mb-1">School Year</label>
                <div class="flex space-x-4">
                    <select id="schoolYearStart" class="border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:border-blue-500">
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <!-- Add more options as needed -->
                    </select>
                    <span class="text-gray-700 self-center">-</span>
                    <select id="schoolYearEnd" class="border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:border-blue-500">
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>


            <!-- Proceed Button (Centered) -->
            <div class="mt-6 w-96 flex justify-center">
                <button type="button" onclick="showInfo()" class="bg-blue-900 text-white px-4 py-2 rounded-md w-full hover:bg-blue-800">
                    Proceed
                </button>
            </div>
        </div>
    </div>

   
      <!-- Applicants Table -->
      <div class="overflow-x-auto mx-2 md:mx-4 my-4"> <!-- Responsive margins -->
        <table class="min-w-full table-auto border-collapse border-l border-r border-gray-300">
            <thead style="background-color: #174069;" class="text-white">
                <tr>
                    <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Student Number</th>
                    <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Student Name</th>
                    <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Program</th>
                    <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Department</th>
                    <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Year of Graduation</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white">
                    <td class="px-4 py-2 border border-gray-300">14-05-000001</td>
                    <td class="px-4 py-2 border border-gray-300">Juan Dela Cruz</td>
                    <td class="px-4 py-2 border border-gray-300">Bachelor of Science in Information Technology</td>
                    <td class="px-4 py-2 border border-gray-300">College of Computer Science</td>
                    <td class="px-4 py-2 border border-gray-300">2024</td>
                </tr>
                <tr class="bg-white">
                    <td class="px-4 py-2 border border-gray-300">14-05-000002</td>
                    <td class="px-4 py-2 border border-gray-300">Maria Santos</td>
                    <td class="px-4 py-2 border border-gray-300">Bachelor of Science in Information Technology</td>
                    <td class="px-4 py-2 border border-gray-300">College of Computer Science</td>
                    <td class="px-4 py-2 border border-gray-300">2024</td>
                </tr>
            </tbody>
        </table>
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

<style scoped>
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

    .section-header {
        background-color: #174069;
        padding: 12px;
        text-align: center;
        margin-bottom: 10px;
    }

    .section-header h1 {
        color: white;
        font-size: 24px;
        margin: 0;
    }

    @media print {
        #studentId, #studentId+button, label[for="studentId"] {
            display: none;
        }

        .no-print, button, a {
            display: none !important;
        }

        table {
            width: 100% !important;
            table-layout: fixed !important;
            border-collapse: collapse !important;
        }

        th, td {
            padding: 10px !important;
            font-size: 12px !important;
            border: 1px solid black !important;
        }

        tr {
            page-break-inside: avoid !important;
            page-break-after: auto !important;
        }

        thead {
            display: table-header-group !important;
        }

        @page {
            size: auto;
            margin: 10mm;
        }
    }
</style>
