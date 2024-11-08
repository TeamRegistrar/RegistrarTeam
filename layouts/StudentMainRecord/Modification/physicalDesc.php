<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - Physical Description</title>
    <link rel="stylesheet" href="physicalDesc.css">
</head>
<body>
   <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php">Modification of Data</a>
    <span>&gt;</span>
    <span class="current-page">Physical Description</span>
</div>

    <div class="header">
        <h2><?php echo "Modification of Data - Physical Description"; ?></h2>
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
                <div class="form-row">
                    <div class="form-group">
                        <label for="height">Height (CMS):</label>
                        <input type="text" id="height" name="height" placeholder="Height in cm" value="<?php echo isset($_POST['height']) ? $_POST['height'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight (LBS):</label>
                        <input type="text" id="weight" name="weight" placeholder="Weight in lbs" value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="built">Built:</label>
                        <input type="text" id="built" name="built" placeholder="Built" value="<?php echo isset($_POST['built']) ? $_POST['built'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="eye-color">Eye Color:</label>
                        <input type="text" id="eye-color" name="eye-color" placeholder="Eye Color" value="<?php echo isset($_POST['eye-color']) ? $_POST['eye-color'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="hair-color">Hair Color:</label>
                        <input type="text" id="hair-color" name="hair-color" placeholder="Hair Color" value="<?php echo isset($_POST['hair-color']) ? $_POST['hair-color'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="complexion">Complexion:</label>
                        <input type="text" id="complexion" name="complexion" placeholder="Complexion" value="<?php echo isset($_POST['complexion']) ? $_POST['complexion'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="other-features">Other Distinguish Feature:</label>
                        <input type="text" id="other-features" name="other-features" placeholder="Other Distinguishing Feature" value="<?php echo isset($_POST['other-features']) ? $_POST['other-features'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="disability">Physical Handicap or Disability (f any):</label>
                        <input type="text" id="disability" name="disability" placeholder="Physical Handicap or Disability" value="<?php echo isset($_POST['disability']) ? $_POST['disability'] : ''; ?>">
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
