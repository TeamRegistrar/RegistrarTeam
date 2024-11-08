<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Encoding</title>
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
    <a href="/rescmreg/layouts/Grades Management/EncodingOfGrades.php">Encoding of Grades</a>
    <span>&gt;</span>
    <span class="current-page">Set Encoding Grades</span>
</div>
     <!-- Main content -->
     <div class="main-content p-6" id="mainContent">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-center mb-4">Grade Encoding</h1>
        <form>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="examName" class="block text-sm font-medium text-gray-700">Exam Name</label>
                    <input type="text" id="examName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="gradeEncodingDate" class="block text-sm font-medium text-gray-700">Grade Encoding Date</label>
                    <input type="date" id="gradeEncodingDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="mt-4">
                <input type="checkbox" id="allowSpecificFaculty" class="mr-2">
                <label for="allowSpecificFaculty" class="inline-block text-sm font-medium text-gray-700">Allow Specific Faculty</label>
            </div>
            <div id="specificFacultyInput" class="mt-2 hidden">
                <label for="employeeName" class="block text-sm font-medium text-gray-700">Enter Employee ID/Name</label>
                <input type="text" id="employeeName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceed</button>
            </div>
        </form>
        <section class="table-section p-6 bg-white shadow-md rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <thead>
                    <tr style="background-color: #012D5E; color: white;">
                        <th scope="col" class="px-6 py-3 text-center">Exam Name</th>
                        <th scope="col" class="px-6 py-3 text-center">Encoding Date Range</th>
                        <th scope="col" class="px-6 py-3 text-center">Faculty Employee ID</th>
                        <th scope="col" class="px-6 py-3 text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center">Exam 1</td>
                        <td class="px-6 py-4 text-center">2024-01-01 - 2024-01-31</td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center">Exam 2</td>
                        <td class="px-6 py-4 text-center">2024-02-01 - 2024-02-29</td>
                        <td class="px-6 py-4 text-center">67890</td>
                        <td class="px-6 py-4 text-center"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        </section>
    </div>
    <script>
        const allowSpecificFacultyCheckbox = document.getElementById('allowSpecificFaculty');
        const specificFacultyInput = document.getElementById('specificFacultyInput');

        allowSpecificFacultyCheckbox.addEventListener('change', () => {
            if (allowSpecificFacultyCheckbox.checked) {
                specificFacultyInput.style.display = 'block';
            } else {
                specificFacultyInput.style.display = 'none';
            }
        });
        // Breadcrumb handling based on navigation
    document.addEventListener('DOMContentLoaded', function() {
        const breadcrumb = document.getElementById('breadcrumb');
        const referrer = document.referrer;

        // Check if navigated from Course Maintenance
        if (referrer.includes('course-maintenance.php')) {
            // Breadcrumb already shows "Update Category"
        } else {
            // Adjust breadcrumb if accessed directly or from elsewhere
            breadcrumb.innerHTML = '<a href="/rescmreg/layouts/home.php">Home</a> &gt; <span>Update Category</span>';
        }
    });
    </script>
</body>
</html>