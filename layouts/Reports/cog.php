<?php
// Define the current page
$current_page = 'Certification of Grades'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Certification of Grades' => '/rescmreg/layouts/Reports/cog.php' 
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certification of Grades</title>
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
            <h1 class="text-2xl font-semibold">Certification of Grades</h1>
        </section>

        <div class="bg-white p-8 rounded shadow-md flex flex-col items-center mt-10">
            <div class="relative w-96 mb-6">
                <label for="studentId" class="absolute -top-6 left-2 bg-white px-1 text-gray-700 text-sm"><strong>Student ID</strong></label>
                <input type="text" id="studentId" placeholder="e.g xx-xxxxx-xxx" class="border border-gray-300 p-2 rounded-md w-96 focus:outline-none focus:border-blue-500">
                <button type="button" onclick="showInfo()" class="bg-blue-900 text-white px-4 py-2 rounded-md w-96 hover:bg-blue-800 mt-10">
                    Proceed
                </button>
                
            </div>
        
            <!-- Info Section -->
        </div>
        <div class="mt-6 mx-4"> <!-- Added mx-4 for left and right margin -->
            <!-- Info Section -->
            <div class="flex flex-col items-start mb-6"> <!-- Use mb-6 for bottom margin -->
                <p class="text-gray-700 mb-2" style="line-height: 1.5;">Full Name:</p> <!-- Added line-height and bottom margin -->
                <p class="text-gray-700 mb-2" style="line-height: 1.5;">Course / Major:</p> <!-- Added line-height and bottom margin -->
                <p class="text-gray-700" style="line-height: 1.5;">Year:</p> <!-- Added line-height -->
            </div>
        
          <!-- First Row with Semesters and School Year -->
    <div class="flex flex-wrap items-center justify-between mb-8">
        <!-- Semesters -->
        <div class="flex space-x-4 flex-wrap"> <!-- Ensure that items can wrap -->
            <label class="inline-flex items-center ml-4 mr-4">
                <input type="checkbox" id="1st" class="form-checkbox text-blue-600"> 1st Sem
            </label>
            <label class="inline-flex items-center ml-4 mr-4">
                <input type="checkbox" id="2nd" class="form-checkbox text-blue-600"> 2nd Sem
            </label>
            <label class="inline-flex items-center ml-4 mr-4">
                <input type="checkbox" id="3rd" class="form-checkbox text-blue-600"> 3rd Sem
            </label>
            <label class="inline-flex items-center ml-4 mr-4">
                <input type="checkbox" id="summer" class="form-checkbox text-blue-600"> Summer
            </label>
        </div>

        <div class="flex items-center ml-8 space-x-4 flex-wrap"> <!-- Ensure that items can wrap -->
            <span class="mr-4">School Year:</span>
            <select class="border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500 max-w-full">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
            <span class="mx-2">-</span>
            <select class="border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500 max-w-full">
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>
    </div>

    <div class="flex items-center space-x-8 mt-8">
        <label class="inline-flex items-center">
            <input type="checkbox" class="form-checkbox text-blue-600"> Include GWA without print
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" class="form-checkbox text-blue-600"> Show grade not encoded
        </label>
    </div>
    <div class="container mx-auto p-8">
        <!-- Header -->
        <section class="text-center mb-10">
            <h1 class="text-3xl font-semibold">Final Grades for Semester</h1>
        </section>

       <!-- Grades Table -->
<div class="overflow-x-auto mx-2 md:mx-4 my-4"> <!-- Responsive margins -->
    <table class="min-w-full table-auto border-collapse border-l border-r border-gray-300">
        <thead style="background-color: #174069;" class="text-white">
            <tr>
                <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Course</th>
                <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Final Grades</th>
                <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Units</th>
                <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Remarks</th>
                <th class="px-4 py-2 border-b-4 border-orange-500 text-left">Instructor</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white">
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Capstone 2 Project</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">1.25</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">3.0</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Passed</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Stephen Curry</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Free Elective</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">1.0</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">3.0</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Passed</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Buddy Hield</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">On-The-Job Training (200hrs)</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">1.0</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">3.0</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Passed</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Olivia Rodrigo</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">IT Elective 3 (Lec)</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">1.25</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">2.0</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Passed</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Luka Doncic</td>
            </tr>
            <tr class="bg-white">
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">IT Elective 3 (Lab)</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">3.25</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">1.0</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Failed</td>
                <td class="px-4 py-2 border-b-4 border-orange-500 text-left">Luka Doncic</td>
            </tr>
        </tbody>
    </table>
</div>

        
        <div class="bg-white p-8 rounded shadow-md mt-8">
            <!-- Address to, Prepared by, Purpose, Checked by -->
            <div class="flex flex-col space-y-4">
                <div class="flex">
                    <label for="addressTo" class="w-1/4 font-semibold text-gray-700">Address to:</label>
                    <input type="text" id="addressTo" class="border border-gray-300 p-1 rounded-md w-1/2 focus:outline-none focus:border-blue-500">
                </div>
                
                <div class="flex">
                    <label for="preparedBy" class="w-1/4 font-semibold text-gray-700">Prepared by:</label>
                    <input type="text" id="preparedBy" class="border border-gray-300 p-1 rounded-md w-1/2 focus:outline-none focus:border-blue-500">
                </div>
        
                <div class="flex">
                    <label for="purpose" class="w-1/4 font-semibold text-gray-700">Purpose:</label>
                    <input type="text" id="purpose" class="border border-gray-300 p-1 rounded-md w-1/2 focus:outline-none focus:border-blue-500">
                </div>
        
                <div class="flex">
                    <label for="checkedBy" class="w-1/4 font-semibold text-gray-700">Checked by:</label>
                    <input type="text" id="checkedBy" class="border border-gray-300 p-1 rounded-md w-1/2 focus:outline-none focus:border-blue-500">
                </div>
            </div>
        
            <!-- University Registrar Section -->
            <div class="mt-8 flex flex-col items-start">
                <label class="font-semibold text-gray-700">University Registrar:</label>
                <div class="border-t border-gray-300 w-full mt-4 mb-4"></div> <!-- Line for signature -->
            </div>
        
            <!-- Print Button -->
            <div class="mt-4 flex justify-end">
                <button class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-800">Print</button>
            </div>
        </div>
        <script>
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

    /* 201 File Section */
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

    /* Base styles for the dropdown */
    #dropdown {
        visibility: hidden;
        opacity: 0;
        transform: translateY(-10px);
        transition: visibility 0s linear 0.2s, opacity 0.3s ease, transform 0.3s ease;
        /* Add delay to visibility */
    }

    /* When hovering over the button or the dropdown itself */
    #dropdownButton:hover+#dropdown,
    #dropdown:hover {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0s;
        /* No delay on showing */
    }



    @media print {

        /* Hide the Student ID Input Section */
        #studentId,
        #studentId+button,
        label[for="studentId"] {
            display: none;
        }

        /* You can also hide any other non-printable sections like buttons */
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
      /* Student information section */
        .info-container {
            background-color: #fff;
            width: 700px;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-container p {
            font-size: 18px;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .info-container p strong {
            font-weight: bold;
        }
        .info-container {
        background-color: #fff;
        width: 700px;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .info-container {
    background-color: #ffffff; /* Background color */
    border: 1px solid #e2e8f0; /* Light gray border */
    border-radius: 8px; /* Rounded corners */
    padding: 20px; /* Padding for content */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
}

.info-container p {
    font-size: 18px; /* Font size */
    color: #2d3748; /* Text color (dark gray) */
    margin-bottom: 10px; /* Space between paragraphs */
    line-height: 1.5; /* Line height for readability */
}

.info-container p strong {
    font-weight: bold; /* Bold font for strong elements */
}
/* Custom Styles for the Info Section */
.info-container {
    background-color: #fff;
    width: 700px; /* Adjust to fit your design */
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.info-container p {
    font-size: 18px;
    margin-bottom: 15px;
    line-height: 1.6;
}

/* Checkboxes and Dropdowns */
.checkbox-group {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

.checkbox-group label {
    margin-bottom: 10px;
}

.checkbox-group input[type="checkbox"] {
    margin-right: 10px;
}

.select-container {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
}

/* Style for the dropdowns */
select {
    border: 1px solid #d1d5db; /* Tailwind's gray-300 */
    border-radius: 4px;
    padding: 8px;
    width: 48%; /* Adjust to fit your design */
}

.semester-label {
    margin-right: 20px; /* Space between the label and checkboxes */
}

/* Button styling (for "Proceed" button) */
.bg-blue-900 {
    background-color: #1E3A8A; /* Tailwind's blue-900 */
}

.bg-blue-900:hover {
    background-color: #1E40AF; /* Tailwind's blue-800 */
}
.checkbox-group {
    display: flex;
    align-items: center;
    gap: 15px; /* Space between checkbox items */
}

select {
    border: 1px solid #d1d5db; /* Tailwind's gray-300 */
    border-radius: 4px;
    padding: 8px;
    width: 150px; /* Set fixed width for dropdowns */
}



</style>