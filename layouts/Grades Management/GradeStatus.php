<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades Status</title>
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
    <span class="current-page">Grade Status</span>
</div>
    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-center mb-4">Grades Status</h1>
        <form>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="term" class="block text-sm font-medium text-gray-700">Term</label>
                    <select id="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1st Year">1st Year</option>
                        </select>
                </div>
                <div>
                    <label for="startYear" class="block text-sm font-medium text-gray-700">Start Year</label>
                    <input type="number" id="startYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="endYear" class="block text-sm font-medium text-gray-700">End Year</label>
                    <input type="number" id="endYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>


            <h2 class="text-2xl font-bold text-center mt-10">Grades Status For</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-10">
            <div class="flex items-center justify-center">
                <input type="radio" id="show-all-not-verified" name="grades-status" value="show-all-not-verified">
                <label for="show-all-not-verified" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Show All Not Verified</label>
            </div>
        
            <div class="flex items-center justify-center">
                <input type="radio" id="show-all-verified" name="grades-status" value="show-all-verified">
                <label for="show-all-verified" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Show All Verified</label>
            </div>
        
            <div class="flex items-center justify-center">
                <input type="radio" id="grades-encoded" name="grades-status" value="grades-encoded">
                <label for="grades-encoded" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Grades Encoded</label>
            </div>
        
            <div class="flex items-center justify-center">
                <input type="radio" id="grades-not-encoded" name="grades-status" value="grades-not-encoded">
                <label for="grades-not-encoded" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Grades Not Encoded</label>
            </div>
        </div>


            <div class="grid grid-cols-2 gap-4 mt-10">
                <div>
                    <label for="college" class="block text-sm font-medium text-gray-700">College</label>
                    <input type="text" id="college" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="employeeName" class="block text-sm font-medium text-gray-700">Employee ID/Name</label>
                    <input type="text" id="employeeName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10">Proceed</button>
            </div>
        </form>
         <!-- Table section -->


 <section class="table-section p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-lg font-semibold text-gray-900 mb-6 text-center">List of Departments</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             
                <tr style="background-color: #012D5E; color: white;">
                    <th scope="col" class="px-6 py-3 text-center">Faculty ID</th>
                    <th scope="col" class="px-6 py-3 text-center">Faculty Name</th>
                    <th scope="col" class="px-6 py-3 text-center">College/Dept Code</th>
                    <th scope="col" class="px-6 py-3 text-center">Status</th>
                    <th scope="col" class="px-6 py-3 text-center"># Student Enrolled/Student with Grade</th>
                    <th scope="col" class="px-6 py-3 text-center">Subject Code </th>
                    <th scope="col" class="px-6 py-3 text-center">Section </th>

                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 text-center">000212</th> <!--Course code table-->
                    <td class="px-6 py-4 text-center">John Doe</td> <!--Course name row-->
                    <td class="px-6 py-4 text-center">College of Engineering</td> <!--Classification rows-->
                    <td class="px-6 py-4 text-center">✔</td> <!--Major row-->
                    <td class="px-6 py-4 text-center">50/45</td> <!--College offering row-->
                    <td class="px-6 py-4 text-center">ENG101 (Introduction to Engineering)</td> <!--Department row-->
                    <td class="px-6 py-4 text-center">A</td> <!--Curriculum format row-->
                </tr>


               <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 text-center">067890</th> <!--Course code row-->
                    <td class="px-6 py-4 text-center">Jane Smith</td> <!--Course name row-->
                    <td class="px-6 py-4 text-center">College of Arts and Sciences</td> <!--Classification row-->
                    <td class="px-6 py-4 text-center">✔✔</td> <!--Major row-->
                    <td class="px-6 py-4 text-center">40/40</td> <!--COllege offering row-->
                    <td class="px-6 py-4 text-center">MATH101 (Calculus)</td> <!--Department row-->
                    <td class="px-6 py-4 text-center">B</td> <!--Curriculum format row-->
                </tr>

            </tbody>
        </table>
    </div>
</section>        
    </div>
    <script>
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