<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Entrance Data</title>
    <!-- Load Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Load Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Load Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="courseProgram.css">
    <!-- javascript connected to navbar.js on components folder -->
    <script src="/Navbar + Applicant Summary/Components/navbar.js"></script>
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
    color: #FFA500; /* Mustard yellow color */
    font-weight: bold;
}
/* Add some top padding to the container to avoid overlap with the fixed breadcrumbs */
.container {
    padding-top: 50px;
}
        .section-header {
            background-color: #174069;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .section-header h1 {
            color: white;
            font-size: 24px;
            margin: 0;
        }
        </style>

</head>

<body>
    <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/2rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/2rescmreg/layouts/Reports/officialTOR.php">Official Transcript of Records</a>
    <span>&gt;</span>
    <span class="current-page">Update Entrance Data</span>
</div>
    <!-- Navbar placeholder -->
    <div id="navbar-placeholder"></div>

    <!-- Main content -->
    <div class="main-content" id="mainContent">
       

    <section class="section-header mb-6 mt-14">
            <h1 class="text-2xl font-semibold">Update Entrance Data</h1>
        </section>

        <!-- Student Information -->
        <div class="bg-white p-8 rounded shadow-md flex flex-col mt-10">
            <div class="flex flex-wrap gap-20">
                <div class="flex flex-col">
                    <p class="mb-4"><strong>Student Name:</strong> John Doe</p>
                    <p class="mb-4"><strong>Major:</strong> Bachelor of Science in Information Technology</p>
                    <p class="mb-4"><strong>Year:</strong> 4th Year</p>
                    <p class="mb-4"><strong>Academic Year:</strong> 2024-2025</p>
                </div>
            </div>

            <!-- Educational Data -->
            <h2 class="text-lg font-semibold mb-5 mt-5">Educational Data</h2>
            <div class="relative w-80 mb-6">
                <label for="elementary" class="block mb-2 font-medium">Elementary</label>
                <select id="elementary" class="mt-1 block w-full p-2 pr-10 border rounded-md appearance-none">
                    <option>ABC Elementary School</option>
                    <option>New Era University</option>
                    <option>Adamson University</option>
                    <option>Far Eastern University</option>
                    <option>Ateneo de Manila University</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute right-3 top-12 transform -translate-y-1/4 h-5 w-5 text-gray-500 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>


            <!-- Secondary -->
            <div class="relative w-80 mb-6">
                <label for="secondary" class="block mb-2 font-medium">Secondary</label>
                <select id="secondary" class="mt-1 block w-full p-2 pr-10 border rounded-md appearance-none">
                    <option>Biringan High School</option>
                    <option>New Era University</option>
                    <option>Adamson University</option>
                    <option>Far Eastern University</option>
                    <option>Ateneo de Manila University</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute right-3 top-12 transform -translate-y-1/4 h-5 w-5 text-gray-500 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <!-- College -->
            <div class="relative w-80 mb-6">
                <label for="college" class="block mb-2 font-medium">College</label>
                <select id="college" class="mt-1 block w-full p-2 pr-10 border rounded-md appearance-none">
                    <option>New Era University</option>
                    <option>Polytechnic University of the Philippines</option>
                    <option>University of the Philippines</option>
                    <option>Adamson University</option>
                    <option>Far Eastern University</option>
                    <option>Ateneo de Manila University</option>
                    <option>University of Santo Tomas</option>
                    <option>De La Salle University</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute right-3 top-12 transform -translate-y-1/4 h-5 w-5 text-gray-500 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>


            <!-- Entrance Data -->
            <h2 class="text-lg font-semibold mb-5 mt-5">Entrance Data</h2>
            <div class="flex items-center">
                <label for="admission-date" class="mr-4 text-gray-700">Admission Date</label>
                <input id="admission-date" type="text" value="2024-10-16"
                    class="border border-gray-400 rounded-md p-1 w-48 bg-gray-100" readonly>
            </div>

            <!-- Documents Presented Table -->
            <h2 class="text-sm font-semibold mb-5 mt-10">Documents Presented</h2>

            <table class="w-full border-collapse">
                <thead class="bg-blue-900 text-white items-center">
                    <tr>
                        <th>Passed</th>
                        <th>Date Passed</th>
                        <th class="p-2 text-center" colspan="3">Required Items</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-200">
                        <td class="p-2 border-r border-gray-300">GMC</td>
                        <td class="p-2 border-r border-gray-300">6/21/2024</td>
                        <td class="p-2">Transcript of Records</td>
                        <td class="p-2">F-137</td>
                        <td class="p-2">NSO Birth Certificate</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="p-2 border-r border-gray-300">Recommendation Letter</td>
                        <td class="p-2 border-r border-gray-300">6/22/2024</td>
                        <td class="p-2">Certification of Grades</td>
                        <td class="p-2">F-138</td>
                        <td class="p-2">Shifting Form</td>
                    </tr>
                    <!-- Update Button -->
                    <tr>
                        <td colspan="5" class="p-2 text-right">
                            <a href="/rescmreg/layouts/StudentMainRecord/Credential Records/credentials2.0.php">
                                <button class="bg-blue-900 text-white py-1 px-2 rounded hover:bg-blue-800 transition">
                                    Update
                                </button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Form 18 Data -->
            <h2 class="text-lg font-semibold mb-5 mt-5">Form 18 Data</h2>

            <div class="flex space-x-10">
                <!-- Primary Dropdown -->
                <div class="inline-block items-center">
                    <label for="primary" class="block text-base font-medium text-gray-700 mb-5">Primary</label>
                    <select id="primary" name="primary" class="mt-1 block w-full border rounded-md sm:text-base"
                        style="width: 150px;">
                        <option value="" disabled selected hidden></option> <!-- Hidden option, not selectable -->
                        <option value="primary1">Option 1</option>
                        <option value="primary2">Option 2</option>
                    </select>
                </div>

                <!-- Intermediate Dropdown -->
                <div class="inline-block">
                    <label for="intermediate"
                        class="block text-base font-medium text-gray-700 mb-5">Intermediate</label>
                    <select id="intermediate" name="intermediate"
                        class="mt-1 block w-full border rounded-md sm:text-base" style="width: 150px;">
                        <option value="" disabled selected hidden></option> <!-- Hidden option, not selectable -->
                        <option value="intermediate1">Option 1</option>
                        <option value="intermediate2">Option 2</option>
                    </select>
                </div>

                <!-- Secondary Dropdown -->
                <div class="inline-block">
                    <label for="secondary" class="block text-base font-medium text-gray-700 mb-5">Secondary</label>
                    <select id="secondary" name="secondary" class="mt-1 block w-full border rounded-md sm:text-base"
                        style="width: 150px;">
                        <option value="" disabled selected hidden></option> <!-- Hidden option, not selectable -->
                        <option value="secondary1">Option 1</option>
                        <option value="secondary2">Option 2</option>
                    </select>
                </div>

                <div class="inline-flex items-center space-x-4">
                    <div class="inline-block">
                        <label for="year-start" class="block text-base font-medium text-gray-700 mb-5">Year
                            Start</label>
                        <select id="year-start" name="year-start"
                            class="mt-1 block w-full border rounded-md sm:text-base" style="width: 100px;">
                            <option value="" disabled selected hidden></option> <!-- Hidden option, not selectable -->
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>

                    <span class="text-xl mt-11">-</span>

                    <!-- Year Start & Year End -->
                    <div class="inline-block">
                        <label for="year-end" class="block text-base font-medium text-gray-700 mb-5">Year End</label>
                        <select id="year-end" name="year-end" class="mt-1 block w-full border rounded-md sm:text-base"
                            style="width: 100px;">
                            <option value="" disabled selected hidden></option> <!-- Hidden option, not selectable -->
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="flex justify-end gap-4 mt-4">
                <button onclick="window.print()"
                    class="bg-blue-900 text-white px-3 mt-10 py-1 rounded-md hover:bg-blue-800 flex items-center">
                    <i class="bi bi-save mr-2"></i> Save Changes
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
        if (referrer.includes('officialTOR.php')) {
            // Breadcrumb already shows "Update Category"
        } else {
            // Adjust breadcrumb if accessed directly or from elsewhere
            breadcrumb.innerHTML = '<a href="/rescmreg/layouts/home.php">Home</a>';
        }
    });
    
    </script>

</body>

</html>