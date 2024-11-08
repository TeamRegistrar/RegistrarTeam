<?php
// Define the current page
$current_page = 'Evaluation of Grades'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Evaluation of Grades' => '/rescmreg/layouts/Reports/evalOfGrades.php' 
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation of Grades</title>
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
            <h1 class="text-2xl font-semibold">Evaluation of Grades</h1>
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
                <!-- Dropdown for Filter Year Button -->
                <div class="flex justify-end relative">
                    <button id="dropdownButton"
                        class="text-white bg-blue-900 hover:bg-blue-800 font-medium rounded-md px-4 py-2 mb-10">Select
                        Year
                        <i class="b bi-chevron-down pl-2"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="dropdown"
                        class="z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow-md absolute right-0 mt-11">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownButton">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">1st Year</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">2nd Year</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">3rd Year</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">4th Year</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Student Information -->
                <div class="mb-5">
                    <h2 class="text-lg font-semibold mb-5">Student Information</h2>
                    <div class="flex flex-wrap gap-20">
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>Student Name:</strong> John Doe</p>
                            <p class="mb-4"><strong>Major:</strong> Bachelor of Science in Information Technology</p>
                            <p class="mb-4"><strong>Year:</strong> 4th Year</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>GWA:</strong> 1.27</p>
                            <p class="mb-4"><strong>Status:</strong> Regular</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="mb-4"><strong>Units Required:</strong> 158.0</p>
                            <p class="mb-4"><strong>Units Taken:</strong> 116.0</p>
                        </div>
                    </div>
                </div>

                <!-- Color Legend -->
                <div class="mb-5">
                    <h2 class="font-semibold mb-5 text-sm">Color Legend</h2>
                    <div class="flex flex-wrap gap-20">
                        <!-- Passed Legend -->
                        <div class="flex flex-col">
                            <p class="text-sm">
                                <strong>Passed -</strong>
                                <span class="inline-block w-4 h-4 bg-green-500 ml-2"></span>
                                <!-- Green oval -->
                            </p>
                        </div>

                        <!-- Failed Legend -->
                        <div class="flex flex-col">
                            <p class="text-sm">
                                <strong>Failed -</strong>
                                <span class="inline-block w-4 h-4 bg-red-500 ml-2"></span>
                                <!-- Red oval -->
                            </p>
                        </div>

                        <!-- Less Credited Unit from Required Unit Legend -->
                        <div class="flex flex-col">
                            <p class="text-sm">
                                <strong>Less Credited Unit from Required Unit -</strong>
                                <span class="inline-block w-4 h-4 bg-yellow-500 ml-2"></span>
                                <!-- Yellow oval -->
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Semester Radio Button -->
                <div class="flex mb-4 mt-8">
                    <div class="mr-6 flex items-center">
                        <input type="radio" id="1stSem" name="sem" value="1stSem"
                            class="form-radio text-blue-600 h-5 w-5" required>
                        <label for="1stSem" class="ml-2 text-sm cursor-pointer">1st Sem</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="2ndSem" name="sem" value="2ndSem"
                            class="form-radio text-blue-600 h-5 w-5" required>
                        <label for="2ndSem" class="ml-2 text-sm cursor-pointer">2nd Sem</label>
                    </div>
                </div>
                <!-- Evaluation of Grades Table -->
                <table class="min-w-full bg-white border border-gray-300 mb-10">
                    <thead>
                        <tr class="bg-blue-900 text-white">
                            <th class="py-2 px-4 border-b">Subject Code</th>
                            <th class="py-2 px-4 border-b">Description</th>
                            <th class="py-2 px-4 border-b">Total Units</th>
                            <th class="py-2 px-4 border-b">Credit Earned</th>
                            <th class="py-2 px-4 border-b">Grade</th>
                            <th class="py-2 px-4 border-b">Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 1st Year, 1st Semester -->
                        <tr>
                            <td colspan="6" class="py-2 px-4 font-bold text-base">1st Year, 1st Semester
                            </td>
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">CS101</td>
                            <td class="py-2 px-4 border-b">Introduction to Computer Science</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">1.0</td>
                            <td class="py-2 px-4 border-b">Passed</td>
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">MATH101</td>
                            <td class="py-2 px-4 border-b">Calculus I</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">1.5</td>
                            <td class="py-2 px-4 border-b">Passed</td>
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">ENG101</td>
                            <td class="py-2 px-4 border-b">English Communication</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">2.0</td>
                            <td class="py-2 px-4 border-b">Passed</td>
                        </tr>

                        <!-- 1st Year, 2nd Semester -->
                        <tr>
                            <td colspan="6" class="py-2 px-4 font-bold text-base">1st Year, 2nd Semester
                            </td>
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">CS102</td>
                            <td class="py-2 px-4 border-b">Programming Fundamentals</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">1.5</td>
                            <td class="py-2 px-4 border-b">Passed</td>
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">MATH102</td>
                            <td class="py-2 px-4 border-b">Calculus II</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">2.0</td>
                            <td class="py-2 px-4 border-b">Passed</td>
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">PHYS101</td>
                            <td class="py-2 px-4 border-b">General Physics</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">2.5</td>
                            <td class="py-2 px-4 border-b">Passed</td>
                        </tr>
                    </tbody>
                </table>

                <div class="flex justify-end mt-4">
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