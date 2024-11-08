<?php
// Define the current page
$current_page = 'Official Transcript of Records'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Official Transcript of Records' => '/rescmreg/layouts/Reports/officialTOR.php' 
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Transcript of Records</title>
    <!-- Load Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Load Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Load Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

    <!-- Navbar placeholder -->
    <div id="navbar-placeholder"></div>

    <section class="section-header mb-6 mt-14">
            <h3 class="text-2xl font-semibold">Official Transcript of Records</h3>
        </section>

        <!-- Student ID Input Section -->
        <div class="bg-white p-8 rounded shadow-md flex flex-col items-center mt-10">
            <div class="relative w-96 mb-6">
                <label for="studentId"
                    class="absolute -top-6 left-2 bg-white px-1 text-gray-700 text-sm"><strong>Student
                        ID</strong></label>
                <input type="text" id="studentId" placeholder="e.g xx-xxxxx-xxx"
                    class="border border-gray-300 p-2 rounded-md w-96 focus:outline-none focus:border-blue-500">
                <button onclick="showInfo()"
                    class="bg-blue-900 text-white px-4 py-2 rounded-md w-96 hover:bg-blue-800 mt-10">Proceed</button>
            </div>

            <!-- Hidden Info Section -->
            <div id="studentInfo" class="hidden">
                <!-- Dropdown for Update Button -->
                <div class="flex justify-end relative">
                    <button id="dropdownButton"
                        class="text-white bg-blue-900 hover:bg-blue-800 font-medium rounded-md px-4 py-2 mb-10">Update
                        <i class="b bi-chevron-down pl-2"></i>
                    </button>


                    <!-- Dropdown Menu -->
                    <div id="dropdown"
                        class="z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow-md absolute right-0 mt-11 hidden">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownButton">
                            <li><a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php" class="block px-4 py-2 hover:bg-gray-100">Student Information</a></li>
                            <li><a href="/rescmreg/layouts/Reports/updateEntrance.php" class="block px-4 py-2 hover:bg-gray-100">Entrance
                                    Data</a></li>
                            <li><a href="/rescmreg/layouts/Reports/updateGraduation.php" class="block px-4 py-2 hover:bg-gray-100">Graduation
                                    Data</a></li>
                        </ul>
                    </div>
                </div>

                <!-- I. Student Information -->
                <div class="mb-5">
                    <h2 class="text-lg font-semibold mb-5">I. Student Information</h2>
                    <div class="flex flex-wrap gap-20">
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>Student Name:</strong> John Doe</p>
                            <p class="mb-4"><strong>Address:</strong> 123 Main St, Magdalena City</p>
                            <p class="mb-4"><strong>Gender:</strong> Male</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>Date of Birth:</strong> January 1, 2024</p>
                            <p class="mb-4"><strong>Place of Birth:</strong> Biringan City</p>
                        </div>
                    </div>
                </div>

                <!-- II. Entrance Data -->
                <div class="mb-5">
                    <h2 class="text-lg font-semibold mb-5">II. Entrance Data</h2>
                    <div class="flex flex-wrap gap-20">
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>Elementary:</strong> ABC Elementary School</p>
                            <p class="mb-4"><strong>Secondary:</strong> Biringan High School</p>
                            <p class="mb-4"><strong>College:</strong> New Era University</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>Course:</strong> Introduction to Programming</p>
                            <p class="mb-4"><strong>Degree:</strong> BS Information Technology</p>
                        </div>
                    </div>
                </div>

                <!-- III. Graduation Data -->
                <div class="mb-5">
                    <h2 class="text-lg font-semibold mb-5">III. Graduation Data</h2>
                    <div class="flex flex-wrap gap-20">
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>Special Order No.:</strong> ABC Elementary School</p>
                            <p class="mb-4"><strong>Date Issued:</strong> January 1, 2024</p>
                            <p class="mb-4"><strong>Date of Graduation:</strong> June 15, 2024</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>Date of Dismissal:</strong> August 12, 2024</p>
                            <p class="mb-4"><strong>Date Prepared:</strong> July 30, 2024</p>
                        </div>
                    </div>
                </div>

                <!-- IV. TOR Tabulation Section -->
                <div class="mb-10">
                    <table class="min-w-full bg-white border border-gray-300 rounded-md text-center">
                        <thead>
                            <tr class="bg-gray-200">
                                <th
                                    class="p-2 bg-blue-900 border-r border-gray-300 text-center text-sm text-white font-semibold">
                                    Course Code
                                </th>
                                <th
                                    class="p-2 bg-blue-900 border-r border-gray-300 text-center text-sm text-white font-semibold">
                                    Descriptive Title
                                </th>
                                <th
                                    class="p-2 bg-blue-900 border-r border-gray-300 text-center text-sm text-white font-semibold">
                                    Units</th>
                                <th
                                    class="p-2 bg-blue-900 border-r border-gray-300 text-center text-sm text-white font-semibold">
                                    Credits Earned</th>
                                <th
                                    class="p-2 bg-blue-900 border-r border-gray-300 text-center text-sm text-white font-semibold">
                                    Grade</th>
                                <th class="p-2 bg-blue-900 text-center text-sm text-white font-semibold">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 border-r border-gray-300">IT101</td>
                                <td class="p-2 border-r border-gray-300">Introduction to IT</td>
                                <td class="p-2 border-r border-gray-300">3</td>
                                <td class="p-2 border-r border-gray-300">3</td>
                                <td class="p-2 border-r border-gray-300">1.75</td>
                                <td class="p-2 text-green-600 font-semibold">Passed</td>
                            </tr>
                            <tr>
                                <td class="p-2 border-r border-gray-300">IT102</td>
                                <td class="p-2 border-r border-gray-300">Programming 101</td>
                                <td class="p-2 border-r border-gray-300">3</td>
                                <td class="p-2 border-r border-gray-300">3</td>
                                <td class="p-2 border-r border-gray-300">2.50</td>
                                <td class="p-2 text-green-600 font-semibold">Passed</td>
                            </tr>
                            <tr>
                                <td class="p-2 border-r border-gray-300">MATH101</td>
                                <td class="p-2 border-r border-gray-300">College Algebra</td>
                                <td class="p-2 border-r border-gray-300">3</td>
                                <td class="p-2 border-r border-gray-300">0</td>
                                <td class="p-2 border-r border-gray-300">3.50</td>
                                <td class="p-2 text-red-600 font-semibold">Failed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Signature Section -->
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Report Prepared by:</label>
                        <input type="text" value="John Doe" class="border border-gray-300 p-2 rounded-md w-full mb-5">
                        <input type="text" value="James Luke" class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Report Checked by:</label>
                        <input type="text" class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Report Approved by:</label>
                        <input type="text" class="border border-gray-300 p-2 rounded-md w-full">
                    </div>
                </div>

                <!-- Remarks Section -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">University Registrar's Name</label>
                    <input type="text" class="border border-gray-300 p-2 rounded-md w-full">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Remarks for end of TOR</label>
                    <textarea rows="4" class="border border-gray-300 p-2 rounded-md w-full"></textarea>
                </div>

                <!-- Buttons Section -->
                <div class="flex justify-end gap-4 mt-4">
                    <!-- View History Button -->
                    <button class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-800 flex items-center">
                        <i class="bi bi-clock-history mr-2"></i> View History
                    </button>

                    <!-- Print Button -->
                    <button onclick="window.print()"
                        class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-800 flex items-center">
                        <i class="bi bi-printer mr-2"></i> Print
                    </button>
                </div>



            </div>
        </div>
    </div>
    <script>
        function showInfo() {
            document.getElementById('studentInfo').classList.remove('hidden');
        }

        const dropdownButton = document.getElementById('dropdownButton');
        const dropdown = document.getElementById('dropdown');

        dropdownButton.addEventListener('click', function () {
            dropdown.classList.toggle('hidden');
        });
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