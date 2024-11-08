<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - Family Data</title>
    <link rel="stylesheet" href="familyData.css">
</head>
<body>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php">Modification of Data</a>
    <span>&gt;</span>
    <span class="current-page">Family Data</span>
</div>
    
    <div class="header">
        <h2><?php echo "Modification of Data - Family Data"; ?></h2>
    </div>

    <div class="container">
        <div class="student-info">
            <div class="info-header">
                <div class="student-details">
                    <p>Student ID: <strong><?php echo "12-3457-890"; ?></strong></p>
                    <p>Student name: <strong><?php echo "John Doe"; ?></strong></p>
                    <p>Curriculum Year:</p>
                </div>
                <div class="academic-details">
                    <p>Major:</p>
                    <p>Year Level/Term:</p>
                    <p>Academic Year:</p>
                </div>
                <div class="actions">
                    <button class="print-button">🖨 Print</button>
                    <button class="history-button">📝 View history</button>
                </div>
            </div>
        </div>

        <div class="form-section">
            <form method="POST" action="">
                <h3>FATHER'S INFORMATION</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father-name">Father's Name:</label>
                        <input type="text" id="father-name" name="father-name" placeholder="Father's Name" value="<?php echo isset($_POST['father-name']) ? $_POST['father-name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="father-occupation">Occupation:</label>
                        <input type="text" id="father-occupation" name="father-occupation" placeholder="Occupation" value="<?php echo isset($_POST['father-occupation']) ? $_POST['father-occupation'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father-company">Company Name:</label>
                        <input type="text" id="father-company" name="father-company" placeholder="Company Name" value="<?php echo isset($_POST['father-company']) ? $_POST['father-company'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="father-phone">Telephone Number:</label>
                        <input type="text" id="father-phone" name="father-phone" placeholder="Telephone Number" value="<?php echo isset($_POST['father-phone']) ? $_POST['father-phone'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father-address">Company Address:</label>
                        <input type="text" id="father-address" name="father-address" placeholder="Company Address" value="<?php echo isset($_POST['father-address']) ? $_POST['father-address'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="father-email">Father's Email Address:</label>
                        <input type="email" id="father-email" name="father-email" placeholder="Father's Email Address" value="<?php echo isset($_POST['father-email']) ? $_POST['father-email'] : ''; ?>">
                    </div>
                </div>

                <h3>MOTHER'S INFORMATION</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother-name">Mother's Name:</label>
                        <input type="text" id="mother-name" name="mother-name" placeholder="Mother's Name" value="<?php echo isset($_POST['mother-name']) ? $_POST['mother-name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mother-occupation">Occupation:</label>
                        <input type="text" id="mother-occupation" name="mother-occupation" placeholder="Occupation" value="<?php echo isset($_POST['mother-occupation']) ? $_POST['mother-occupation'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother-company">Company Name:</label>
                        <input type="text" id="mother-company" name="mother-company" placeholder="Company Name" value="<?php echo isset($_POST['mother-company']) ? $_POST['mother-company'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mother-phone">Telephone Number:</label>
                        <input type="text" id="mother-phone" name="mother-phone" placeholder="Telephone Number" value="<?php echo isset($_POST['mother-phone']) ? $_POST['mother-phone'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother-address">Company Address:</label>
                        <input type="text" id="mother-address" name="mother-address" placeholder="Company Address" value="<?php echo isset($_POST['mother-address']) ? $_POST['mother-address'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mother-email">Mother's Email Address:</label>
                        <input type="email" id="mother-email" name="mother-email" placeholder="Mother's Email Address" value="<?php echo isset($_POST['mother-email']) ? $_POST['mother-email'] : ''; ?>">
                    </div>
                </div>

                <h3>BROTHER(S)/SISTER(S) INFORMATION</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="sibling1-name">Name:</label>
                        <input type="text" id="sibling1-name" name="sibling1-name" placeholder="Name" value="<?php echo isset($_POST['sibling1-name']) ? $_POST['sibling1-name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="sibling1-dob">Date of Birth:</label>
                        <input type="date" id="sibling1-dob" name="sibling1-dob" value="<?php echo isset($_POST['sibling1-dob']) ? $_POST['sibling1-dob'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="sibling1-program">Program / Occupation:</label>
                        <input type="text" id="sibling1-program" name="sibling1-program" placeholder="Program / Occupation" value="<?php echo isset($_POST['sibling1-program']) ? $_POST['sibling1-program'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="sibling1-school">School / Company:</label>
                        <input type="text" id="sibling1-school" name="sibling1-school" placeholder="School / Company" value="<?php echo isset($_POST['sibling1-school']) ? $_POST['sibling1-school'] : ''; ?>">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="back-button">BACK</button>
                    <button type="submit" class="save-button">SAVE CHANGES</button>
                </div>
            </form>
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
