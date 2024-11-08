<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - Residence Status</title>
    <link rel="stylesheet" href="residenceStatus.css">
</head>
<body>
     <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php">Modification of Data</a>
    <span>&gt;</span>
    <span class="current-page">Residence Status</span>
</div>
    <div class="header">
        <h2><?php echo "Modification of Data - Residence Status"; ?></h2>
    </div>

    <div class="container">
        <div class="student-info">
            <div class="info-header">
                <div class="student-details">
                    <p>Student ID: <strong><?php echo "12-3457-890"; ?></strong></p>
                    <p>Student name: <strong><?php echo "John Doe"; ?></strong></p>
                    <p>Curriculum Year</p>
                </div>
                <div class="academic-details">
                    <p>Major</p>
                    <p>Year Level/Term:</p>
                    <p>Academic Year</p>
                </div>
                <div class="actions">
                    <button class="print-button">🖨 Print</button>
                    <button class="history-button">📝 View history</button>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h3>HOME RESIDENCE</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="home-apartment">APARTMENT NAME / HOUSE NO. / STREET / BARANGGAY:</label>
                    <input type="text" id="home-apartment" placeholder="Apartment / House No." value="<?php echo isset($_POST['home-apartment']) ? $_POST['home-apartment'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="home-city">CITY / MUNICIPALITY:</label>
                    <input type="text" id="home-city" placeholder="City / Municipality" value="<?php echo isset($_POST['home-city']) ? $_POST['home-city'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="home-province">PROVINCE / STATE:</label>
                    <input type="text" id="home-province" placeholder="Province / State" value="<?php echo isset($_POST['home-province']) ? $_POST['home-province'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="home-country">COUNTRY:</label>
                    <input type="text" id="home-country" placeholder="Country" value="<?php echo isset($_POST['home-country']) ? $_POST['home-country'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="home-zip">ZIP CODE:</label>
                    <input type="text" id="home-zip" placeholder="ZIP Code" value="<?php echo isset($_POST['home-zip']) ? $_POST['home-zip'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="home-phone">TELEPHONE NUMBER:</label>
                    <input type="text" id="home-phone" placeholder="Telephone Number" value="<?php echo isset($_POST['home-phone']) ? $_POST['home-phone'] : ''; ?>">
                </div>
            </div>

            <h3>CURRENT CONTACT ADDRESS <input type="checkbox" id="copy-home-current" <?php echo isset($_POST['copy-home-current']) ? 'checked' : ''; ?>> COPY HOME ADDRESS</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="current-contact-person">CONTACT PERSON / GUARDIAN NAME:</label>
                    <input type="text" id="current-contact-person" placeholder="Contact Person" value="<?php echo isset($_POST['current-contact-person']) ? $_POST['current-contact-person'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="current-relation">RELATION:</label>
                    <input type="text" id="current-relation" placeholder="Relation" value="<?php echo isset($_POST['current-relation']) ? $_POST['current-relation'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="current-apartment">APARTMENT NAME / HOUSE NO. / STREET / BARANGGAY:</label>
                    <input type="text" id="current-apartment" placeholder="Apartment / House No." value="<?php echo isset($_POST['current-apartment']) ? $_POST['current-apartment'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="current-city">CITY / MUNICIPALITY:</label>
                    <input type="text" id="current-city" placeholder="City / Municipality" value="<?php echo isset($_POST['current-city']) ? $_POST['current-city'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="current-province">PROVINCE / STATE:</label>
                    <input type="text" id="current-province" placeholder="Province / State" value="<?php echo isset($_POST['current-province']) ? $_POST['current-province'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="current-country">COUNTRY:</label>
                    <input type="text" id="current-country" placeholder="Country" value="<?php echo isset($_POST['current-country']) ? $_POST['current-country'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="current-zip">ZIP CODE:</label>
                    <input type="text" id="current-zip" placeholder="ZIP Code" value="<?php echo isset($_POST['current-zip']) ? $_POST['current-zip'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="current-phone">TELEPHONE NUMBER:</label>
                    <input type="text" id="current-phone" placeholder="Telephone Number" value="<?php echo isset($_POST['current-phone']) ? $_POST['current-phone'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="current-email">EMAIL ADDRESS:</label>
                    <input type="email" id="current-email" placeholder="Email Address" value="<?php echo isset($_POST['current-email']) ? $_POST['current-email'] : ''; ?>">
                </div>
            </div>

            <h3>EMERGENCY CONTACT ADDRESS <input type="checkbox" id="copy-home-emergency" <?php echo isset($_POST['copy-home-emergency']) ? 'checked' : ''; ?>> COPY HOME ADDRESS</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="emergency-contact-person">CONTACT PERSON / GUARDIAN NAME:</label>
                    <input type="text" id="emergency-contact-person" placeholder="Contact Person" value="<?php echo isset($_POST['emergency-contact-person']) ? $_POST['emergency-contact-person'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="emergency-relation">RELATION:</label>
                    <input type="text" id="emergency-relation" placeholder="Relation" value="<?php echo isset($_POST['emergency-relation']) ? $_POST['emergency-relation'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="emergency-apartment">APARTMENT NAME / HOUSE NO. / STREET / BARANGGAY:</label>
                    <input type="text" id="emergency-apartment" placeholder="Apartment / House No." value="<?php echo isset($_POST['emergency-apartment']) ? $_POST['emergency-apartment'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="emergency-city">CITY / MUNICIPALITY:</label>
                    <input type="text" id="emergency-city" placeholder="City / Municipality" value="<?php echo isset($_POST['emergency-city']) ? $_POST['emergency-city'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="emergency-province">PROVINCE / STATE:</label>
                    <input type="text" id="emergency-province" placeholder="Province / State" value="<?php echo isset($_POST['emergency-province']) ? $_POST['emergency-province'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="emergency-country">COUNTRY:</label>
                    <input type="text" id="emergency-country" placeholder="Country" value="<?php echo isset($_POST['emergency-country']) ? $_POST['emergency-country'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="emergency-zip">ZIP CODE:</label>
                    <input type="text" id="emergency-zip" placeholder="ZIP Code" value="<?php echo isset($_POST['emergency-zip']) ? $_POST['emergency-zip'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="emergency-phone">TELEPHONE NUMBER:</label>
                    <input type="text" id="emergency-phone" placeholder="Telephone Number" value="<?php echo isset($_POST['emergency-phone']) ? $_POST['emergency-phone'] : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="emergency-email">EMAIL ADDRESS:</label>
                    <input type="email" id="emergency-email" placeholder="Email Address" value="<?php echo isset($_POST['emergency-email']) ? $_POST['emergency-email'] : ''; ?>">
                </div>
            </div>

            <div class="form-actions">
                <button class="back-button">BACK</button>
                <button class="save-button">SAVE CHANGES</button>
            </div>
        </div>
    </div>
    <script>
         // Breadcrumb handling based on navigation
    document.addEventListener('DOMContentLoaded', function() {
        const breadcrumb = document.getElementById('breadcrumb');
        const referrer = document.referrer;

        // Check if navigated from Course Maintenance
        if (referrer.includes('modification.php')) {
            // Breadcrumb already shows "Update Category"
        } else {
            // Adjust breadcrumb if accessed directly or from elsewhere
            breadcrumb.innerHTML = '<a href="/rescmreg/layouts/home.php">Home</a>';
        }
    });

    </script>
</body>
</html>
