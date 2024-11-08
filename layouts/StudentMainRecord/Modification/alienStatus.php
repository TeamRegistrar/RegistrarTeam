<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - Alien Status</title>
    <link rel="stylesheet" href="alienStatus.css">
</head>
<body>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php">Modification of Data</a>
    <span>&gt;</span>
    <span class="current-page">Alien Status</span>
</div>

    <div class="header">
        <h2><?php echo "Modification of Data - Alien Status"; ?></h2>
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
            <div class="form-row">
                <div class="form-group">
                    <label for="visa-status">Visa Status:</label>
                    <input type="text" id="visa-status" placeholder="Visa Status" value="<?php echo isset($_POST['visa-status']) ? $_POST['visa-status'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="authorized-stay">Authorized Stay:</label>
                    <input type="text" id="authorized-stay" placeholder="Authorized Stay" value="<?php echo isset($_POST['authorized-stay']) ? $_POST['authorized-stay'] : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="passport-number">Passport Number:</label>
                    <input type="text" id="passport-number" placeholder="Passport Number" value="<?php echo isset($_POST['passport-number']) ? $_POST['passport-number'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="place-of-issue">Place of Issue:</label>
                    <input type="text" id="place-of-issue" placeholder="Place of Issue" value="<?php echo isset($_POST['place-of-issue']) ? $_POST['place-of-issue'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="expiration-date">Expiration Date:</label>
                    <input type="date" id="expiration-date" value="<?php echo isset($_POST['expiration-date']) ? $_POST['expiration-date'] : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="acr-number">ACR Number:</label>
                    <input type="text" id="acr-number" placeholder="ACR Number" value="<?php echo isset($_POST['acr-number']) ? $_POST['acr-number'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="date-of-issue">Date of Issue:</label>
                    <input type="date" id="date-of-issue" value="<?php echo isset($_POST['date-of-issue']) ? $_POST['date-of-issue'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="expiration-date-2">Expiration Date:</label>
                    <input type="date" id="expiration-date-2" value="<?php echo isset($_POST['expiration-date-2']) ? $_POST['expiration-date-2'] : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="crts-number">CRTS Number:</label>
                    <input type="text" id="crts-number" placeholder="CRTS Number" value="<?php echo isset($_POST['crts-number']) ? $_POST['crts-number'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="date-of-issue-2">Date of Issue:</label>
                    <input type="date" id="date-of-issue-2" value="<?php echo isset($_POST['date-of-issue-2']) ? $_POST['date-of-issue-2'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="expiration-date-3">Expiration Date:</label>
                    <input type="date" id="expiration-date-3" value="<?php echo isset($_POST['expiration-date-3']) ? $_POST['expiration-date-3'] : ''; ?>">
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
