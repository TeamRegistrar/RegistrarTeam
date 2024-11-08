<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - Qualification</title>
    <link rel="stylesheet" href="/rescmreg/layouts/StudentMainRecord/Modification/qualification.css">
</head>
<body>
     <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php">Modification of Data</a>
    <span>&gt;</span>
    <span class="current-page">Qualification</span>
</div>

    <div class="header">
        <h2><?php echo "Modification of Data - Qualification"; ?></h2>
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
                <h3>Write two or three references who can vouch or guarantee for your total behavior.</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="reference1-name">Name:</label>
                        <input type="text" id="reference1-name" name="reference1-name" placeholder="Reference Name" value="<?php echo isset($_POST['reference1-name']) ? $_POST['reference1-name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="reference1-address">Address / Telephone No.:</label>
                        <input type="text" id="reference1-address" name="reference1-address" placeholder="Address / Telephone No." value="<?php echo isset($_POST['reference1-address']) ? $_POST['reference1-address'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="reference2-name">Name:</label>
                        <input type="text" id="reference2-name" name="reference2-name" placeholder="Reference Name" value="<?php echo isset($_POST['reference2-name']) ? $_POST['reference2-name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="reference2-address">Address / Telephone No.:</label>
                        <input type="text" id="reference2-address" name="reference2-address" placeholder="Address / Telephone No." value="<?php echo isset($_POST['reference2-address']) ? $_POST['reference2-address'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="reference3-name">Name:</label>
                        <input type="text" id="reference3-name" name="reference3-name" placeholder="Reference Name" value="<?php echo isset($_POST['reference3-name']) ? $_POST['reference3-name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="reference3-address">Address / Telephone No.:</label>
                        <input type="text" id="reference3-address" name="reference3-address" placeholder="Address / Telephone No." value="<?php echo isset($_POST['reference3-address']) ? $_POST['reference3-address'] : ''; ?>">
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
