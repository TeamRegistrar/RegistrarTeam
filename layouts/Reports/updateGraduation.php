<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Graduation Data</title>
    <!-- Load Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Load Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Load Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
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
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/Reports/OfficialTOR.php">Official Transcript of Records</a>
    <span>&gt;</span>
    <span class="current-page">Update Graduation Data</span>
</div>
    <!-- Navbar placeholder -->
    <div id="navbar-placeholder"></div>

    <!-- Main content -->
    <div class="main-content" id="mainContent">
       

    <section class="section-header mb-6 mt-14">
            <h1 class="text-2xl font-semibold">Update Graduation Data</h1>
        </section>

        <!-- Student Information -->
        <div class="bg-white p-8 rounded shadow-md flex flex-col mt-10">
            <div class="flex flex-wrap gap-20">
                <div class="flex flex-col">
                    <p class="mb-4"><strong>Student Name:</strong> John Doe</p>
                    <p class="mb-4"><strong>Major:</strong> Bachelor of Science in Information Technology</p>
                    <p class="mb-4"><strong>Year:</strong> 4th Year</p>
                    <p class="mb-4"><strong>GWA:</strong> 1.27</p>
                </div>
            </div>

            <!-- Graduation Data -->
            <h2 class="text-lg font-semibold mb-5 mt-5">Graduation Data</h2>
            <div class="flex items-center mb-6">
                <label for="elementary" class="mr-3 text-base font-medium">Graduating Course</label>
                <div class="relative w-80">
                    <select id="elementary" class="mt-1 block w-full p-1 pr-10 border rounded-md appearance-none">
                        <option value="" disabled selected hidden></option> <!-- Hidden option, not selectable -->
                        <option>Bachelor of Science in Information Technology</option>
                        <option>Bachelor of Science in Computer Science</option>
                        <option>Bachelor of Science in Nursing</option>
                        <option>Bachelor of Science in Civil Engineering</option>
                        <option>Bachelor of Science in Biology</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-500 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            <div class="flex items-center mb-6">
                <label for="major" class="mr-3 text-base font-medium">Graduating Major</label>
                <div class="relative w-20">
                    <select id="major" class="mt-1 block w-full p-1 pr-10 border rounded-md appearance-none">
                        <option value="" disabled selected hidden></option> <!-- Hidden option, not selectable -->
                        <option>Option 1</option>
                        <option>Option 2</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-500 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            <div class="flex items-center mb-6">
                <label for="ched-order" class="mr-3 text-base font-medium">Ched Special Order No.</label>
                <input type="text" id="ched-order" class="mt-1 block w-48 p-1 border rounded-md" placeholder="">
            </div>
            <div class="flex items-center mb-6">
                <label for="major" class="mr-3 text-base font-medium">Semester</label>
                <div class="relative w-48">
                    <select id="major" class="mt-1 block w-full p-1 pr-10 border rounded-md appearance-none">
                        <option value="" disabled selected hidden></option> <!-- Hidden option, not selectable -->
                        <option>1st Semester</option>
                        <option>2nd Semester</option>
                        <option>Summer</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-500 pointer-events-none"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center mb-6">
                <label for="date-issued" class="mr-3 text-base font-medium">Date Issued</label>
                <div class="relative w-50">
                    <input type="date" id="date-issued" class="mt-1 block w-full p-1 border rounded-md pr-10"
                        required />
                </div>
            </div>

            <div class="flex items-center mb-6">
                <label for="date-issued" class="mr-3 text-base font-medium">Date of Graduation</label>
                <div class="relative w-50">
                    <input type="date" id="date-issued" class="mt-1 block w-full p-1 border rounded-md pr-10"
                        required />
                </div>
            </div>

            <div class="flex items-center mb-6">
                <label for="date-issued" class="mr-3 text-base font-medium">Date of Dismissal</label>
                <div class="relative w-50">
                    <input type="date" id="date-issued" class="mt-1 block w-full p-1 border rounded-md pr-10"
                        required />
                </div>
            </div>

            <div class="flex items-center mb-6">
                <label for="date-issued" class="mr-3 text-base font-medium">Expected Date of Graduation</label>
                <div class="relative w-50">
                    <input type="date" id="date-issued" class="mt-1 block w-full p-1 border rounded-md pr-10"
                        required />
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

    #college option[hidden] {
        display: none;
    }
</style>