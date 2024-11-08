<?php
// Define the current page
$current_page = 'Main Record'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Main Record' => '/rescmreg/layouts/StudentMainRecord/Main Record/main-record.php'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Student Personal Information Sheet</title>
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/rescmreg/layouts/StudentMainRecord/Main Record/mainrecord.css">
    <style>
        .header h4 {
            margin: 0; 
            color: white;
            display: inline-block; 
        }
    </style>
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
                <a href="<?= htmlspecialchars($link) ?>"><?= htmlspecialchars($title) ?></a>
            <?php endif; ?>
            <?php if ($currentIndex < $breadcrumbCount): ?>
                <span>&gt;</span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="container main-container">
        <div class="header">
            <h4>Main Record</h4>
        </div>
        <div class="row align-items-center mt-4">
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <label for="studentNumber" class="input-group-text bg-white text-dark"><strong>Student Number:</strong></label>
                    <input type="text" class="form-control" id="studentNumber" placeholder="Enter Student Number">
                    <button class="btn" type="button" style="background-color: #003366; color: white;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-outline-dark" onclick="window.print()">
                    <img src="https://img.icons8.com/material-outlined/24/000000/print.png" alt="Print Icon">
                    Print
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="mt-3">General Student Personal Information Sheet</h4>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <p><strong>Date (YYYY/MM/DD):</strong> 2021/08/05</p>
                <p><strong>Status:</strong> New</p>
                <p><strong>Degree:</strong> Baccalaureate</p>
                <p><strong>Student ID:</strong> 21-1111-222</p>
                <p><strong>Course/Year:</strong> Bachelor of Science in Information Technology - 1st Year</p>
                <p><strong>Curriculum Year:</strong> 2018 - 2019</p>
            </div>
            <div class="col-md-4">
                <p><strong>Term:</strong> 1st Sem</p>
            </div>
        </div>

        <div class="section-title">IA - Personal Data</div>
            <div class="section-content personal-info">
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Last Name:</strong> Dela Cruz</p>
                </div>
                <div class="col-md-4">
                    <p><strong>First Name:</strong> Juan</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Middle Name:</strong> Aquino</p>
                </div>
             </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Suffix (If Any):</strong> N/A</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Name in Native Language Character:</strong></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Civil Status:</strong> Single</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Gender:</strong> Male</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Religion:</strong> Iglesia Ni Cristo</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Nationality:</strong> Filipino</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Date of Birth:</strong> 10/04/2002</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Place of Birth:</strong> Manila</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Mobile Number:</strong> 09568934405</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Birth Order:</strong> First Born</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Email Address:</strong> juan.delacruz@neu.edu.ph</p>
                </div>
                <div class="col-md-4">
                    <p></p>
                </div>
            </div>

        <div class="section-title">IB - Alien Status (For Alien/Foreigner Student Only)</div>
        <div class="section-content alien-info">
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Visa Status:</strong> </p>
                </div>
                <div class="col-md-4">
                    <p><strong>Authorized Stay:</strong><p>
                </div>
                <div class="col-md-4">
                    <p><p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Passport Number:</strong> </p>
                </div>
                <div class="col-md-4">
                    <p><strong>Place of Issue:</strong> </p>
                </div>
                <div class="col-md-4">
                    <p><strong>Expiration Date:</strong> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>ACR Number:</strong></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Date of Issue:</strong></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Expiration Date:</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>CRTS Number:</strong></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Date of Issue:</strong></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Expiration Date:</strong></p>
                </div>
            </div>
        </div>


        <div class="section-title">II - Residence Status</div>
        <div class="section-content residence-status">

            <div class="row mb-3">
            <p class="sub-section-title mb-3">Home Address</p>
                <div class="col-md-7">
                    <p><strong>Apartment Name/House No./Street/Barangay:</strong> 1760 Palawan Street, Barangay Rivera</p>
                </div>
                <div class="col-md-4">
                    <p><strong>City/Municipality:</strong> San Juan City</p>
                </div>
            </div> 

            <div class="row mb-3">
                <div class="col-md-4">
                    <p><strong>Province/State:</strong> Metro Manila</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Country:</strong> Philippines</p>
                </div>
                <div class="col-md-4">
                    <p></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <p><strong>ZIP Code:</strong> 1500</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Telephone Number:</strong> 09558943405</p>
                </div>
                <div class="col-md-4">
                    <p></p>
                </div>
            </div>

            <div class="row mb-3">
            <p class="sub-section-title mb-3">Current Contact Address</p>
                <div class="col-md-4">
                    <p><strong>Contact Person/ Guardian Name:</strong> Maria Dela Cruz</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Relation:</strong> Mother</p>
                </div>
                <div class="col-md-4">
                    <p></p>
                </div>
            </div>
    
            <div class="row mb-3">
                <div class="col-md-7">
                    <p><strong>Apartment Name/House No./Street/Barangay:</strong> 1760 Palawan Street, Barangay Rivera</p>
                </div>
                <div class="col-md-4">
                    <p><strong>City/Municipality:</strong> San Juan City</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <p><strong>Province/State:</strong> Metro Manila</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Country:</strong> Philippines</p>
                </div>
                <div class="col-md-4">
                    <p></p>
                </div>
            </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <p><strong>ZIP Code:</strong> 1500</p>
        </div>
        <div class="col-md-4">
            <p><strong>Telephone Number:</strong> 09555927809</p>
        </div>
        <div class="col-md-4">
            <p><strong>Email:</strong> maria.delacruz@gmail.com</p>
        </div>
    </div>

    <div class="row mb-3">
        <p class="sub-section-title mb-3">Emergency Contact Address</p>
        <div class="col-md-4">
            <p><strong>Contact Person/ Guardian Name:</strong> Maria Dela Cruz</p>
        </div>
        <div class="col-md-4">
            <p><strong>Relation:</strong> Mother</p>
        </div>
        <div class="col-md-4">
            <p></p>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-7">
            <p><strong>Apartment Name/House No./Street/Barangay:</strong> 1760 Palawan Street, Barangay Rivera</p>
        </div>
        <div class="col-md-4">
            <p><strong>City/Municipality:</strong> San Juan City</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <p><strong>Province/State:</strong> Metro Manila</p>
        </div>
        <div class="col-md-4">
            <p><strong>Country:</strong> Philippines</p>
        </div>
        <div class="col-md-4">
            <p></p>
        </div>
    </div> 

    <div class="row mb-3">
        <div class="col-md-4">
            <p><strong>ZIP Code:</strong> 1500</p>
        </div>
        <div class="col-md-4">
            <p><strong>Telephone Number:</strong> 09555927809</p>
        </div>
        <div class="col-md-4">
            <p><strong>Email:</strong> maria.delacruz@gmail.com</p>
        </div>
    </div> 


<div class="section-title">III - Physical Description</div>
<div class="section-content physical-description">
    <div class="row">
        <div class="col-md-2">
            <p><strong>Height (cm):</strong> 170</p>
        </div>
        <div class="col-md-2">
            <p><strong>Weight (lbs):</strong> 128.25</p>
        </div>
        <div class="col-md-2">
            <p><strong>Built:</strong> Ectomorph</p>
        </div>
        <div class="col-md-2">
            <p><strong>Eye Color:</strong> Brown</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <p><strong>Hair Color:</strong> Black</p>
        </div>
        <div class="col-md-2">
            <p><strong>Complexion:</strong> Brown</p>
        </div>
        <div class="col-md-3">
            <p><strong>Other Distinguishing Feature:</strong> N/A</p>
        </div>
        <div class="col-md-1">
            <p></p>
        </div>
    </div>
    <div class="row">   
        <div class="col-md-4">
            <p><strong>Physical Handicap/Disability:</strong> N/A</p>
        </div>
    </div>
</div>

<div class="section-title">IV - FAMILY DATA</div>
    <div class="section-content family-data">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Father's Name:</strong> Danilo Dela Cruz</p>
            </div>
            <div class="col-md-6">
                <p><strong>Occupation:</strong> Security Guard</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Company Name:</strong> Pinlan Inc.</p>
            </div>
            <div class="col-md-6">
                <p><strong>Telephone Number:</strong> 09456852374</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Company Address:</strong> Quezon City</p>
            </div>
            <div class="col-md-6">
                <p><strong>Father's Email Address:</strong> danilo.delacruz@gmail.com</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Mother's Name:</strong> Maria Dela Cruz</p>
            </div>
            <div class="col-md-6">
                <p><strong>Occupation:</strong> House Wife</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Company Name:</strong> N/A</p>
            </div>
            <div class="col-md-6">
                <p><strong>Telephone Number:</strong> 09456852374</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Company Address:</strong> N/A</p>
            </div>
            <div class="col-md-6">
                <p><strong>Father's Email Address:</strong> maria.delacruz@gmail.com</p>
            </div>
        </div>
        <div class="row mb-3">
        <p class="sub-section-title mb-3">Brother(s)/Sister(s):</p>
            <div class="row">
                <div class="col-md-2">
                    <p><strong>Name:</strong> N/A</p>
                </div>
                <div class="col-md-2">
                    <p><strong>Date of Birth:</strong> N/A</p>
                </div>
                <div class="col-md-2">
                    <p><strong>Program/Occupation:</strong> N/A</p>
                </div>
                <div class="col-md-2">
                    <p><strong>School/Company:</strong> N/A</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-title">V - Educational Background</div>
    <div class="row mb-3">
        <p class="sub-section-title mb-3">Elementary</p>
        <div class="row">
            <div class="col-md-2">
                <p><strong>Name:</strong> P. Burgos</p>
            </div>
            <div class="col-md-2">
                <p><strong>Program:</strong> Grade 6</p>
            </div>
            <div class="col-md-2">
                <p><strong>Year Graduated:</strong> 2015</p>
            </div>
            <div class="col-md-2">
                <p><strong>Honors/Awards:</strong> </p>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <p class="sub-section-title mb-3">High School</p>
        <div class="row">
            <div class="col-md-2">
                <p><strong>Name:</strong> Victorino Mapa</p>
            </div>
            <div class="col-md-2">
                <p><strong>Program:</strong> Grade 10</p>
            </div>
            <div class="col-md-2">
                <p><strong>Year Graduated:</strong> 2019</p>
            </div>
            <div class="col-md-2">
                <p><strong>Honors/Awards:</strong> </p>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <p class="sub-section-title mb-3">College</p>
        <div class="row">
            <div class="col-md-2">
                <p><strong>Name:</strong> New Era University</p>
            </div>
            <div class="col-md-2">
                <p><strong>Program:</strong> BSIT</p>
            </div>
            <div class="col-md-2">
                <p><strong>Year Graduated:</strong> </p>
            </div>
            <div class="col-md-2">
                <p><strong>Honors/Awards:</strong> </p>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <p class="sub-section-title mb-3">Post-Graduate</p>
        <div class="row">
            <div class="col-md-2">
                <p><strong>Name:</strong> </p>
            </div>
            <div class="col-md-2">
                <p><strong>Program:</strong> </p>
            </div>
            <div class="col-md-2">
                <p><strong>Year Graduated:</strong> </p>
            </div>
            <div class="col-md-2">
                <p><strong>Honors/Awards:</strong> </p>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <p class="sub-section-title mb-3">Vocational</p>
        <div class="row">
            <div class="col-md-2">
                <p><strong>Name:</strong> </p>
            </div>
            <div class="col-md-2">
                <p><strong>Program:</strong> </p>
            </div>
            <div class="col-md-2">
                <p><strong>Year Graduated:</strong> </p>
            </div>
            <div class="col-md-2">
                <p><strong>Honors/Awards:</strong> </p>
            </div>
        </div>
    </div>
<div class="section-title">VI - General Qualification</div>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Languages:</strong> Tagalog,English,Japanese</p>
        </div>
        <div class="col-md-6">
            <p><strong>Hobbies:</strong> Playing Board Games</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Skills:</strong> Web Designing,Programming</p>
        </div>
        <div class="col-md-6">
            <p><strong>Talents:</strong> N/A</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Sports:</strong> Volleyball,Badminton</p>
        </div>
        <div class="col-md-6">
            <p><strong>Honors/Awards/Merits(EX: "Model Students, 2020):</strong> Student Leader President</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Extra-Curricular Activities(Organization,Club,etc.):</strong> CBI,SITES,CSSC</p>
        </div>
        <div class="col-md-6">
            <p><strong>Why Am I taking this program?:</strong></p>
        </div>
    </div>
<div class="section-title">VII - Qualification</div>
    <div class="row">
        <div class="col-md-7">
            <p><strong>WRITE TWO OR THREE REFERENCES WHO CAN VOUCH OR GUARANTEE FOR YOUR TOTAL BEHAVIOR.</strong></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Name:</strong> Paolo Ortega</p>
        </div>
        <div class="col-md-6">
            <p><strong>Address/Contact:</strong> 09558943405</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Name:</strong> Paolo Ortega</p>
        </div>
        <div class="col-md-6">
            <p><strong>Address/Contact:</strong> 09558943405</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Name:</strong> Paolo Ortega</p>
        </div>
        <div class="col-md-6">
            <p><strong>Address/Contact:</strong> 09558943405</p>
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
