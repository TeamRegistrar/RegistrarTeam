<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Subject Group to CHED Format</title>
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
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/Reports/officialTORofCFG.php">Official Transcript of Records of Candidate for Graduation</a>
    <span>&gt;</span>
    <span class="current-page">Map Subject Group to CHED Format</span>
</div>

    <!-- Navbar placeholder -->
    <div id="navbar-placeholder"></div>

    <!-- Main content -->
    <div class="main-content" id="mainContent">
        

    <section class="section-header mb-6 mt-14">
            <h1 class="text-2xl font-semibold">Map Subject Group to CHED Format</h1>
        </section>

        <!-- Map Subject Filtering Section -->
        <div class="bg-white p-8 rounded shadow-md flex flex-col mt-5 space-y-4">
            <!-- Course Dropdown -->
            <div class="flex items-center space-x-4">
                <label for="course" class="text-sm font-semibold">Course:</label>
                <select id="course" name="course" class="border border-gray-300 px-3 py-1 rounded-md">
                    <option value="">Bachelor of Science in Information Technology</option>
                    <option value="course1">Course 1</option>
                    <option value="course2">Course 2</option>
                </select>
            </div>

            <!-- Subject Group Dropdown -->
            <div class="flex items-center space-x-4">
                <label for="subjectGroup" class="text-sm font-semibold">Subject Group:</label>
                <select id="subjectGroup" name="subjectGroup" class="border border-gray-300 px-3 py-1 rounded-md">
                    <option value="">Bridging CICS</option>
                </select>
            </div>

            <!-- Copy from existing group mapped Dropdown -->
            <div class="flex items-center space-x-4">
                <label for="existingGroup" class="text-sm font-semibold">Copy from existing group mapped:</label>
                <select id="existingGroup" name="existingGroup" class="border border-gray-300 px-3 py-1 rounded-md">
                    <option value="">Select to copy</option>
                    <option value="existing1">Existing Group 1</option>
                    <option value="existing2">Existing Group 2</option>
                </select>
            </div>

            <!-- Group to Display -->
            <div class="flex items-center space-x-4">
                <label for="groupDisplay" class="text-sm font-semibold">Group to Display:</label>
                <input id="groupDisplay" name="groupDisplay" class="border border-gray-300 px-3 py-1 rounded-md"
                    type="text" value=" " readonly>
            </div>

            <!-- Order Number Dropdown -->
            <div class="flex items-center space-x-4">
                <label for="orderNumber" class="text-sm font-semibold">Order Number:</label>
                <select id="orderNumber" name="orderNumber" class="border border-gray-300 px-3 py-1 rounded-md">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <!-- Save Button -->
            <button onclick="showInfo()"
                class="bg-blue-900 text-white text-sm px-4 py-1 rounded-md w-32 hover:bg-blue-800 mt-10">Save Info
            </button>
        </div>

        <!-- Hidden Info Section -->
        <div id="tableInfo" class="hidden">
            <!-- Mapping Information Table -->
            <div class="mt-4 text-center text-sm">
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <!-- Main Header -->
                        <tr>
                            <th colspan="4"
                                class="border border-gray-300 px-4 py-2 bg-blue-900 text-center text-lg text-white font-semibold">
                                Mapping Information</th>
                        </tr>
                        <!-- Sub Headers -->
                        <tr class="bg-gray-200 text-center text-sm">
                            <th class="border border-gray-300 px-4 py-2">Order Number</th>
                            <th class="border border-gray-300 px-4 py-2">Subject Group to Display in Report
                            </th>
                            <th class="border border-gray-300 px-4 py-2">Subject Group</th>
                            <th class="border border-gray-300 px-4 py-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">1</td>
                            <td class="border border-gray-300 px-4 py-2">English</td>
                            <td class="border border-gray-300 px-4 py-2">English</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">1</td>
                            <td class="border border-gray-300 px-4 py-2">English</td>
                            <td class="border border-gray-300 px-4 py-2">GE Core Courses</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">1</td>
                            <td class="border border-gray-300 px-4 py-2">English</td>
                            <td class="border border-gray-300 px-4 py-2">Mandated Course</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">2</td>
                            <td class="border border-gray-300 px-4 py-2">English</td>
                            <td class="border border-gray-300 px-4 py-2">Filipino</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">3</td>
                            <td class="border border-gray-300 px-4 py-2">Mathematics</td>
                            <td class="border border-gray-300 px-4 py-2">Mathematics</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">4</td>
                            <td class="border border-gray-300 px-4 py-2">Science</td>
                            <td class="border border-gray-300 px-4 py-2">Science</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">5</td>
                            <td class="border border-gray-300 px-4 py-2">Social Science</td>
                            <td class="border border-gray-300 px-4 py-2">Social Science</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">6</td>
                            <td class="border border-gray-300 px-4 py-2">Major</td>
                            <td class="border border-gray-300 px-4 py-2">Major</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">7</td>
                            <td class="border border-gray-300 px-4 py-2">Non-Major</td>
                            <td class="border border-gray-300 px-4 py-2">Non-Major</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>


                        <tr>
                            <td class="border border-gray-300 px-4 py-2">8</td>
                            <td class="border border-gray-300 px-4 py-2">Electives</td>
                            <td class="border border-gray-300 px-4 py-2">Electives</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>


                        <tr>
                            <td class="border border-gray-300 px-4 py-2">9</td>
                            <td class="border border-gray-300 px-4 py-2">Physical Education</td>
                            <td class="border border-gray-300 px-4 py-2">Physical Education</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-gray-300 px-4 py-2">9</td>
                            <td class="border border-gray-300 px-4 py-2">Physical Education</td>
                            <td class="border border-gray-300 px-4 py-2">NSTP</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button
                                    class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-500">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Buttons Section -->
            <div class="flex justify-end gap-4 mt-4">
                <!-- View History Button -->
                <button class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-800 flex items-center">
                    <i class="bi bi-clock-history mr-2"></i> View History
                </button>
            </div>
        </div>



    </div>

    <script>

        // Breadcrumb handling based on navigation
    document.addEventListener('DOMContentLoaded', function() {
        const breadcrumb = document.getElementById('breadcrumb');
        const referrer = document.referrer;

        // Check if navigated from Course Maintenance
        if (referrer.includes('officialTOTofCFG.php')) {
            // Breadcrumb already shows "Update Category"
        } else {
            // Adjust breadcrumb if accessed directly or from elsewhere
            breadcrumb.innerHTML = '<a href="/rescmreg/layouts/home.php">Dashboard</a>';
        }
    });
        function showInfo() {
            document.getElementById('tableInfo').classList.remove('hidden');
        }

        const dropdownButton = document.getElementById('dropdownButton');
        const dropdown = document.getElementById('dropdown');

        dropdownButton.addEventListener('click', function () {
            dropdown.classList.toggle('hidden');
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
        color: #FFA500;; /* Mustard yellow color */
        font-weight: bold;
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