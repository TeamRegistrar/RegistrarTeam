<?php
// Define the current page
$current_page = 'Official Transcript of Records of Candidate for Graduation'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Official Transcript of Records of Candidate for Graduation' => '/rescmreg/layouts/Reports/officialTORofCFG.php' 
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Transcript of Records of Candidate for Graduation</title>
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

       
    <section class="section-header mb-6 mt-14">
    <h1 class="text-2xl font-semibold">Official Transcript of Records of Candidate for Graduation</h1>
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

            <!-- Map Subject Group to CHED -->
            <div class="w-full flex justify-end mt-4">
                <a href="mapSubject.php"
                    class="text-blue-600 hover:text-blue-800 font-medium text-sm transition duration-200 ease-in-out">Map
                    Subject Group to CHED Format</a>
            </div>
        </div>


        <!-- Hidden Info Section -->
        <div id="studentInfo" class="hidden">
            <!-- Dropdown for Update Button -->
            <div class="flex justify-end relative">
                <button id="dropdownButton"
                    class="text-white bg-blue-900 hover:bg-blue-800 font-medium rounded-md px-4 py-2 mb-10m mt-8">Update
                    <i class="b bi-chevron-down pl-2"></i>
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdown"
                    class="z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow-md absolute right-0 mt-20">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownButton">
                        <li><a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php" class="block px-4 py-2 hover:bg-gray-100">Student Information</a></li>
                        <li><a href="/rescmreg/layouts/Reports/updateEntrance.php" class="block px-4 py-2 hover:bg-gray-100">Entrance
                                Data</a></li>
                        <li><a href="/rescmreg/layouts/Reports/updateGraduation.php" class="block px-4 py-2 hover:bg-gray-100">Graduation
                                Data</a></li>
                    </ul>
                </div>
            </div>


            <div class="flex items-center mb-6 flex flex-wrap">
                <label for="ncee" class="mr-3 text-base font-medium">NCEE</label>
                <input type="text" id="ncee"
                    class="mt-1 w-20 p-1 mr-10 border rounded-md bg-gray-200 cursor-not-allowed" value=" " readonly />

                <label for="gsa" class="mr-3 ml-5 text-base font-medium">GSA</label>
                <input type="text" id="gsa" class="mt-1 w-20 p-1 mr-10 border rounded-md bg-gray-200 cursor-not-allowed"
                    value=" " readonly />

                <label for="percentile-rank" class="mr-3 ml-5 text-base font-medium">Percentile Rank</label>
                <input type="text" id="percentile-rank"
                    class="mt-1 w-20 p-1 border rounded-md bg-gray-200 cursor-not-allowed" value=" " readonly />
            </div>
            <div class="mb-5">
                <div class="flex flex-wrap gap-20">
                    <div class="flex flex-col">
                        <p class="mb-4"><strong>Last Name:</strong> Doe</p>
                        <p class="mb-4"><strong>First Name:</strong> John</p>
                        <p class="mb-4"><strong>Middle Name:</strong> Butler</p>
                        <p class="mb-4"><strong>Address:</strong> 123 Biringan City</p>
                        <p class="mb-4"><strong>Elementary:</strong> ABC Elementary School</p>
                        <p class="mb-4"><strong>Secondary:</strong> Biringan High School</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="mb-4"><strong>Gender:</strong> Male</p>
                        <p class="mb-4"><strong>Date of Birth:</strong> January 1, 2000</p>
                        <p class="mb-4"><strong>Place of Birth:</strong> Biringan City</p>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <div class="flex flex-wrap gap-20">
                    <div class="flex flex-col">
                        <p class="mb-4"><strong>EL Number:</strong> 12345678</p>
                        <p class="mb-4"><strong>Contact Person Occupation:</strong> Chief Executive Officer</p>
                    </div>
                </div>
            </div>

            <h2 class="font-semibold mt-5 text-base">Admission Credentials</h2>
            <div class="p-4 mb-6">
                <table class="min-w-64 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-900">
                            <th class="p-2 text-white">Credentials Passed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 p-2">F-137</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 p-2">F-138</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 p-2">GMC</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 p-2">Birth Certificate</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Signature Section -->
            <div class="grid grid-cols-4 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Report Prepared by:</label>
                    <input type="text" value="John Doe" class="border border-gray-300 p-2 rounded-md w-full mb-5">
                    <input type="text" value="James Luke" class="border border-gray-300 p-2 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Report Checked by:</label>
                    <input type="text" class="border border-gray-300 p-2 rounded-md w-full mb-5">
                    <input type="text" class="border border-gray-300 p-2 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 mt-5">Registrar's Name:</label>
                    <input type="text" class="border border-gray-300 p-2 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 mt-5">Dean's Name:</label>
                    <input type="text" class="border border-gray-300 p-2 rounded-md w-full">
                </div>
            </div>

            <!-- Remarks Section -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Accounting Division</label>
                <input type="text" class="border border-gray-300 p-2 rounded-md w-96">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Credit Equivalent Notes</label>
                <textarea rows="4" class="border border-gray-300 p-2 rounded-md w-80"></textarea>
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
    /* Header Color */
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

    #dropdown {
        visibility: hidden;
        opacity: 0;
        transform: translateY(-10px);
        transition: visibility 0s linear 0.2s, opacity 0.3s ease, transform 0.3s ease;
    }

    #dropdownButton:hover+#dropdown,
    #dropdown:hover {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0s;
    }



    @media print {

        /* Hide the Student ID Input Section */
        #studentId,
        #studentId+button,
        label[for="studentId"] {
            display: none;
        }

        .no-print,
        button,
        a {
            display: none !important;
        }

        /* Ensure full table width and avoid cutting columns */
        table {
            width: 100% !important;
            table-layout: fixed !important;
            /* Prevent column cutting */
            border-collapse: collapse !important;
        }

        th,
        td {
            padding: 10px !important;
            font-size: 12px !important;
            border: 1px solid black !important;
            /* Ensure borders are printed */
            word-wrap: break-word !important;
            /* Ensure long content breaks correctly */
        }

        /* Prevent cutting between pages */
        tr {
            page-break-inside: avoid !important;
            page-break-after: auto !important;
        }

        /* Ensure table headers repeat on every page */
        thead {
            display: table-header-group !important;
        }

        /* Print-specific margins */
        @page {
            size: auto;
            margin: 10mm;
        }
    }
</style>