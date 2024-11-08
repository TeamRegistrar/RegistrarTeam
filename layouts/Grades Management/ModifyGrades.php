<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades Form</title>
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
    <a href="/rescmreg/layouts/Grades Management/RectificationofGrades.php">Rectification of Grades</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/Grades Management/GradesList.php">Student Information</a>
    <span>&gt;</span>
    <span class="current-page">Edit Information</span>
</div>
    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">
    <div class="container mx-auto px-4 py-8">
        <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Rectification Of Grades</h1>
        <form>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="gradesFor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grades For:</label>
                    <select id="gradesFor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select</option>
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        </select>
                </div>
                <div>
                    <label for="schoolYear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School Year:</label>
                    <select id="schoolYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select</option>
                        <option value="2023-2024">2023-2024</option>
                        <option value="2024-2025">2024-2025</option>
                        </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Term:</label>
                    <select id="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                        </select>
                </div>
                <div>
                    <label for="studentId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID:</label>
                    <input type="text" id="studentId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceed</button>
            </div>
        </form>
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Student Information</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="studentName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student Name:</label>
                    <input type="text" id="studentName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                </div>
                <div>
                    <label for="courseMajor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course/Major:</label>
                    <input type="text" id="courseMajor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mt-4">
                <div>
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year:</label>
                    <input type="text" id="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                </div>
            </div>
        </div>
        <div class="mt-8">
            <h3 class="text-lg font-bold mb-4">Grade Details</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="gradeInRecord" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade in Record:</label>
                    <input type="text" id="gradeInRecord" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                </div>
                <div>
                    <label for="newGrade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Grade:</label>
                    <input type="text" id="newGrade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="remarksInRecord" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks in Record:</label>
                    <input type="text" id="remarksInRecord" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                </div>
                <div>
                    <label for="newRemarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Remarks:</label>
                    <input type="text" id="newRemarks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="creditsEarnedInRecord" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credits Earned in Record:</label>
                    <input type="text" id="creditsEarnedInRecord" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                </div>
                <div>
                    <label for="newCreditsEarned" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Credits Earned:</label>
                    <input type="text" id="newCreditsEarned" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="reasonForChanges" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason for Changes:</label>
                    <textarea id="reasonForChanges" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" rows="3"></textarea>
                </div>
                <div>
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date:</label>
                    <input type="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 items-center mt-10">
                    <div class="flex justify-between w-full">
                        <a href="GradesList.php" id="print-to-ecr" class="text-sm font-medium text-green-700 dark:text-white">Click to Save Changes</a>
                        <a href="GradesList.php" id="print-final-sheet-grade" class="text-sm font-medium text-red-700 dark:text-white">Click to Cancel Edit</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
        <div class="mt-8 overflow-x-auto">
            <section class="table-section p-6 bg-white shadow-md rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr style="background-color: #012D5E; color: white;">
                        <th scope="col" class="px-6 py-3 text-center">Subject Code</th>
                        <th scope="col" class="px-6 py-3 text-center">Subject Name</th>
                        <th scope="col" class="px-6 py-3 text-center">Credits Earned</th>
                        <th scope="col" class="px-6 py-3 text-center">Instructor</th>
                        <th scope="col" class="px-6 py-3 text-center">Grade</th>
                        <th scope="col" class="px-6 py-3 text-center">Remarks</th>
                        <th scope="col" class="px-6 py-3 text-center""></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button></td>
                    </tr>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"></td>
                        <td class="px-6 py-4 text-center"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
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
            breadcrumb.innerHTML = '<a href="/rescmreg/layouts/home.php">Home</a></span>';
        }
    });
    </script>
        </body>
        </html>