<?php
function renderMenu() {
    $menu = [
        "Dashboard" => [
            "icon" => "bi-house", 
            "link" => "dashboard.html"
        ],
        "Student Main Record" => [
            "icon" => "bi-file-earmark-text",
            "sub-menu" => [
                "Main Record" => "/rescmreg/layouts/StudentMainRecord/Main Record/main-record.php",
                "Modification of Data" => "/rescmreg/layouts/StudentMainRecord/Modification/modification.php",
                "Academic Records from other School" => "/rescmreg/layouts/StudentMainRecord/Academic_From_Other_School/acad-records-from-other-school.php",
                "Credential Records" => "/rescmreg/layouts/StudentMainRecord/Credential Records/credentials.php",
                "Grade Status" => "/rescmreg/layouts/StudentMainRecord/Grade_Status/gradeStatus.php",
                "Student Schedule" => "/rescmreg/layouts/StudentMainRecord/Student_Schedule/studentSched.php",
                "Residency Status" => "/rescmreg/layouts/StudentMainRecord/Residency Status/residency-status.php"
            ],
        ],
        "Course Maintenance" => [
            "icon" => "bi-journal", 
            "link" => "/rescmreg/layouts/coursemaintenance/course-maintenance.php"
        ],
        "Curriculum Maintenance" => [
            "icon" => "bi-book",  
            "sub-menu" => [
                "Course Program" => "/rescmreg/layouts/Curriculum Maintenance/courseProgram.php",
                "Colleges" => "/rescmreg/layouts/Curriculum Maintenance/Colleges.php",
                "Departments With College" => "/rescmreg/layouts/Curriculum Maintenance/DepartmentWithColleges.php",
                "Department without College" => "/rescmreg/layouts/Curriculum Maintenance/DepartmentWithoutColleges.php",
                "Courses" => "/rescmreg/layouts/Curriculum Maintenance/Courses.php",
                "Equivalent Subject for Advising " => "/rescmreg/layouts/Curriculum Maintenance/EquivalentSubject.php",
                "Subject Without Credit Unit" => "/rescmreg/layouts/Curriculum Maintenance/SubjectWithoutCredit.php",
                "Course Curriculum" => "/rescmreg/layouts/Curriculum Maintenance/CoursesCurriculum.php",
                "List of Course Offering Subject" => "/rescmreg/layouts/Curriculum Maintenance/List-of-course-offering-subject.php",
                "Copy/Delete Curriculum" => "/rescmreg/layouts/Curriculum Maintenance/Copy-delete.php",
            ]
        ],
        "Grades Management" => [
            "icon" => "bi-pencil",  
            "sub-menu" => [
                "Encoding of Grades - Status Report" => "/rescmreg/layouts/Grades Management/EncodingOfGrades.php",
                "Final Report of Grade" => "/rescmreg/layouts/Grades Management/FinalReportOfGrades.php",
                "Rectification of Grades" => "/rescmreg/layouts/Grades Management/RectificationofGrades.php",
                "Completion of Grades" => "/rescmreg/layouts/Grades Management/CompletionOfGrades.php",
                "Unlocking of Grades" => "/rescmreg/layouts/Grades Management/UnlockingOfGrades.php",
            ]
        ],
        "Reports" => [
            "icon" => "bi-file-earmark",  
            "sub-menu" => [
                "Official Transcript of Records" => "/rescmreg/layouts/Reports/officialTOR.php",
                "Official Transcript of Records of Candidate for Graduation" => "/rescmreg/layouts/Reports/officialTORofCFG.php",
                "Candidate for Graduation" => "/rescmreg/layouts/Reports/candidatesforgrad.php",
                "Certification of Grades" => "/rescmreg/layouts/Reports/cog.php",
                "Evaluation of Grades" => "/rescmreg/layouts/Reports/evalOfGrades.php",
                
            ]
            ],
        "Official Dropping of Subject" => [
            "icon" => "bi-journal", 
            "link" => "/rescmreg/layouts/Official Dropping/OfficialDropping.php",
        ],
    ];

    foreach ($menu as $key => $value) {
        if (isset($value['link'])) {
            echo "<li><a href='#' onclick='loadContent(\"{$value['link']}\", this, [\"$key\"])' title='$key' data-tooltip='$key'><i class='bi {$value['icon']}'></i> <span class='menu-text'>$key</span></a></li>";
        } elseif (isset($value['sub-menu'])) {
            echo "<li class='has-sub-menu'><a href='#' class='menu-item' onclick='toggleSubMenu(this.parentNode)' title='$key' data-tooltip='$key'><i class='bi {$value['icon']}'></i> <span class='menu-text'>$key</span> <i class='bx bx-chevron-down'></i></a>";
            echo "<ul class='sub-menu' style='display: none;'>";
            foreach ($value['sub-menu'] as $subKey => $subValue) {
                echo "<li><a href='#' onclick='loadContent(\"{$subValue}\", this, handleMenuClick(\"$key\", \"$subKey\"))' title='$subKey' data-tooltip='$subKey'>$subKey</a></li>";
            }
            echo "</ul></li>";
        }
    }

    echo "<li class='profile-item'><a href='#' onclick='showProfile()'><img src='/rescmreg/images/profile.jpg' class='profile-image' alt='Profile Image'> <span class='menu-text'>Profile</span> <i class='bi bi-bell' style='float:right;'></i></a></li>";
    echo "<li class='logout-item' onclick='logout()'><a href='#'><i class='bi bi-box-arrow-right'></i> <span class='menu-text'>Log Out</span></a></li>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collapsible Sidebar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">

    <style>
        body  {
            overflow: hidden;
            background-color: var(--background-color);
        }
        .sidebar {
        position: fixed;
        width: 250px;
        height: 90vh;
        background-color: #ffffff;
        transition: all 0.3s ease;
        overflow-y: scroll; /* Enable scrolling */
        -ms-overflow-style: none; /* Hide scrollbar in Internet Explorer and Edge */
        scrollbar-width: none; /* Hide scrollbar in Firefox */
        }
        .sidebar::-webkit-scrollbar {
            display: none; /* Hide scrollbar in Chrome, Safari, and newer versions of Edge */
        }
        .sidebar.collapsed {
            width: 60px;
            background-color: whitesmoke;
        }
            /* Collapse Toggle Positioning */
        .sidebar-header {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: #ffffff;
            padding: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow effect */
        }

        .collapse-icon {
            cursor: pointer;
        }
        .main-content {
            margin-left: 250px;
            transition: all 0.3s ease;
            padding: 10px;
            overflow-y: auto; /* Allow vertical scrolling in main content */
            height: 100vh;
        }
        .main-content.collapsed {
            margin-left: 80px;
        }
        #contentFrame {
            width: 100%;
            height: calc(100vh - 80px); /* Adjust based on your layout */
            border: none; /* Remove default iframe border */
            overflow: hidden; /* Prevent scrollbars in iframe */
            background-color: #fff; /* Optional background color */
        }

        /* Hide scrollbar for WebKit browsers (Chrome, Safari) */
        #contentFrame::-webkit-scrollbar {
            display: none; /* Hides the vertical and horizontal scrollbar */
        }

        /* Hide scrollbar for Firefox */
        #contentFrame {
            scrollbar-width: none; /* Hides the scrollbar */
        }
        .iframe-container {
            width: 100%;
            height: 100%; /* Ensure the container fills available height */
            overflow: hidden; /* Hide scrollbar */
        }

        #iframe-contentFrame {
            width: 100%;
            height: 100%;
            border: none;
            overflow: auto; /* Enable scrolling */
            scrollbar-width: none; /* Firefox: hide scrollbar */
        }

        #iframe-contentFrame::-webkit-scrollbar {
            display: none; /* Chrome, Safari: hide scrollbar */
        }

        /* Profile Section */
        .profile-item a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s ease;
        }

        .profile-item a:hover {
            background-color: #e0e0e0;
            border-radius: 5px;
        }

        .profile-image {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        /* Notification Icon */
        .notification-icon {
            margin-left: auto;
            font-size: 18px;
            color: #666;
        }

        /* Sub-menu styling */
        .sub-menu {
            list-style-type: none;
            padding-left: 50px;
            display: none;
        }

        .sub-menu li a {
            padding: 8px 15px;
            font-size: 14px;
        }

        /* Toggle icon rotation */
        .rotate {
            transform: rotate(180deg);
        }

        /* Logout button */
        .logout-item a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s ease;
        }

        .logout-item a:hover {
            background-color: #e0e0e0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div id="hamburgerIcon" class="hamburger-icon">
            <i class="bx bx-menu" onclick="toggleSidebar()"></i>
        </div>
        <div class="logo_item">
            <img src="/rescmreg/images/NEU Logo.png" alt="NEU Logo">
            <span class="neu-university">NEW ERA UNIVERSITY</span> NEU SYSTEM
        </div>
    </nav>

    <div id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <div id="collapseToggle" class="collapse-icon" onclick="toggleSidebar()">
                <i class="bx bx-arrow-from-right" id="collapseIcon"></i>
            </div>
        </div>
        <ul class="nav_list">
            <?php renderMenu(); ?>
        </ul>
    </div>

    <div id="mainContent" class="main-content">
        
        <div class="iframe-container">
    <iframe id="contentFrame" src=""></iframe> <!-- Frame for dynamic content -->
</div>

    <script>
        const breadcrumbContainer = document.getElementById('breadcrumbs');

        function updateBreadcrumbs(path) {
            breadcrumbContainer.innerHTML = path.map((item, index) => {
                // Create a breadcrumb link for all but the last item
                return index < path.length - 1 ? `<a href="#" onclick="goToBreadcrumb(${index})">${item}</a>` : `<span class="active">${item}</span>`;
            }).join(' > ');
        }

        function goToBreadcrumb(index) {
            // Logic to navigate back to a specific breadcrumb level
            const path = getBreadcrumbPath(index);
            updateBreadcrumbs(path);
            loadContent(path[path.length - 1]); // Load the content corresponding to the clicked breadcrumb
        }

        function getBreadcrumbPath(index) {
            // Get the current breadcrumb trail as an array
            return breadcrumbTrail.slice(0, index + 1);
        }

        let breadcrumbTrail = [];

        function loadContent(page, menuItem, breadcrumbPath) {
            const contentFrame = document.getElementById('contentFrame');
            contentFrame.src = page;

            // Save active menu in localStorage
            localStorage.setItem('activeMenu', JSON.stringify(breadcrumbPath));

            // Update active menu item
            const menuItems = document.querySelectorAll('.nav_list li a');
            menuItems.forEach(item => item.classList.remove('active'));
            menuItem.classList.add('active');

            // Update breadcrumbs
            breadcrumbTrail = breadcrumbPath; // Store the current breadcrumb path
            updateBreadcrumbs(breadcrumbTrail);
        }


        function handleMenuClick(menuName, subMenuName = '') {
            const breadcrumbPath = [menuName];

            if (subMenuName) {
                breadcrumbPath.push(subMenuName);
            }

            return breadcrumbPath;
        }

        function toggleSubMenu(menuItem) {
            const subMenu = menuItem.querySelector('.sub-menu');
            const icon = menuItem.querySelector('.bx-chevron-down');
            if (subMenu) {
                subMenu.style.display = (subMenu.style.display === "none" || subMenu.style.display === "") ? "block" : "none";
                icon.classList.toggle('rotate');
            }
        }

        function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('collapsed');

    // Apply tooltips when sidebar is collapsed
    const navLinks = document.querySelectorAll('.nav_list li a');
    if (sidebar.classList.contains('collapsed')) {
        navLinks.forEach(link => {
            link.setAttribute('data-tooltip', link.getAttribute('title'));
        });
    } else {
        navLinks.forEach(link => {
            link.removeAttribute('data-tooltip');
        });
    }
}

    </script>
</body>
</html>