<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Grades</title>
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
    <a href="/rescmreg/layouts/Grades Management/UnlockingOfGrades.php">Unlocking of Grades</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/Grades Management/UnlockingList.php">List of Unlocking</a>
    <span>&gt;</span>
    <span class="current-page">Unlocking Sheet</span>
</div>
    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">
        <div class="mt-8">
            <section class="table-section p-6 bg-white shadow-md rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h2 class="text-xl font-bold text-center mb-4">Faculty List Load</h2>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr style="background-color: #012D5E; color: white;">
                        <th scope="col" class="px-6 py-3 text-center">Student ID</th>
                        <th scope="col" class="px-6 py-3 text-center">Student Name</th>
                        <th scope="col" class="px-6 py-3 text-center">Force Unlock</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Unlock</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Unlock</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Unlock</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Unlock</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Unlock</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>