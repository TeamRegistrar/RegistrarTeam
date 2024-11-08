<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credential Records</title>
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="stylescred.css">
</head>
<body>
    <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Credential Records/credentials.php">Credential Records</a>
    <span>&gt;</span>
    <span class="current-page">Requirements Item</span>
</div>

    <div class="container main-container">
        <div class="header text-center">
            <h2>Credential Records</h2>
        </div>

        <div class="row justify-content-start align-items-center mb-4">
            <div class="col-md-4">
                <p class="text-left"><strong>Admission Date:</strong> MM/DD/YYYY</p>
            </div>
        </div>

        <!-- New Container Section -->
        <div class="row justify-content-center mb-4 blue-background">
            <div class="col-md-5 text-center box-style mr-10">
                <p class="text-white">PASSED</p>
            </div>
            <div class="col-md-5 text-center box-style">
                <p class="text-white">DATE PASSED</p>
            </div>
        </div>

        <!-- Passed Items List -->
        <div class="row">
            <div class="col-md-6" id="passedItemsContainer">
                <ul id="passedItemsList"></ul>
            </div>
            <div class="col-md-6" id="datePassedContainer">
                <ul id="datePassedList"></ul>
            </div>
        </div>

        <!-- Required Items Section -->
        <div class="required-items-container">
            <div class="section-title">Required Items</div>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li data-item="Certificate of Grades">Certificate of Grades <span class="btn-add" onclick="addItem('Certificate of Grades')">+</span></li>
                        <li data-item="F-137">F-137 <span class="btn-add" onclick="addItem('F-137')">+</span></li>
                        <li data-item="ALS Certificate">ALS Certificate <span class="btn-add" onclick="addItem('ALS Certificate')">+</span></li>
                        <li data-item="Transfer Credential">Transfer Credential <span class="btn-add" onclick="addItem('Transfer Credential')">+</span></li>
                        <li data-item="TOR - Copy for NEU">TOR - Copy for NEU <span class="btn-add" onclick="addItem('TOR - Copy for NEU')">+</span></li>
                        <li data-item="Affidavit of Loss">Affidavit of Loss <span class="btn-add" onclick="addItem('Affidavit of Loss')">+</span></li>
                        <li data-item="Recommendation Letter - Non INC">Recommendation Letter - Non INC <span class="btn-add" onclick="addItem('Recommendation Letter - Non INC')">+</span></li>
                        <li data-item="Marriage Certificate">Marriage Certificate <span class="btn-add" onclick="addItem('Marriage Certificate')">+</span></li>
                        <li data-item="ALS Diploma">ALS Diploma <span class="btn-add" onclick="addItem('ALS Diploma')">+</span></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li data-item="Transcript of Record">Transcript of Record <span class="btn-add" onclick="addItem('Transcript of Record')">+</span></li>
                        <li data-item="Shifting Form">Shifting Form <span class="btn-add" onclick="addItem('Shifting Form')">+</span></li>
                        <li data-item="Patotoo ng Lokal">Patotoo ng Lokal <span class="btn-add" onclick="addItem('Patotoo ng Lokal')">+</span></li>
                        <li data-item="NSTP Certificate">NSTP Certificate <span class="btn-add" onclick="addItem('NSTP Certificate')">+</span></li>
                        <li data-item="Subject Description">Subject Description <span class="btn-add" onclick="addItem('Subject Description')">+</span></li>
                        <li data-item="GSPS">GSPS <span class="btn-add" onclick="addItem('GSPS')">+</span></li>
                        <li data-item="Honorable Dismissal">Honorable Dismissal <span class="btn-add" onclick="addItem('Honorable Dismissal')">+</span></li>
                        <li data-item="Passport">Passport <span class="btn-add" onclick="addItem('Passport')">+</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row justify-content-start align-items-center mb-4">
            <div class="col-md-4">
                <h4 class="text-left"><strong>Remarks:</strong></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <p><strong>(Only for the latest course graduated Entrance Data Remarks)</strong></p>
            </div>
        </div>

        <div class="header text-center">
            <h4>Form 17</h4>
        </div>
    </div>
    
    <script src="/rescmreg/layouts/StudentMainRecord/Credential Records/buttonfunc.js"></script>
</body>
</html>
