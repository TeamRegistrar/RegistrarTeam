<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - Personal Data</title>
    <link rel="stylesheet" href="personalDetails.css">
    <style>
        body {
            margin-left: 50px;
            margin-right: 50px;
            font-family: Arial, sans-serif;
            margin-top: 55px;
        }
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
        </style>
</head>
<body>
        <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php">Modification of Data</a>
    <span>&gt;</span>
    <span class="current-page">Personal Data</span>
</div>
        <div class="header">
            <h2><?php echo "Modification of Data - Personal Data"; ?></h2>
        </div>

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
                    <label for="last-name">Last name:</label>
                    <input type="text" id="last-name" placeholder="Last Name" value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" placeholder="First Name" value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="middle-name">Middle Name:</label>
                    <input type="text" id="middle-name" placeholder="Middle Name" value="<?php echo isset($_POST['middle-name']) ? $_POST['middle-name'] : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="suffix">Suffix (If any)</label>
                    <input type="text" id="suffix" placeholder="Suffix" value="<?php echo isset($_POST['suffix']) ? $_POST['suffix'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="native-name">Name in native language character</label>
                    <input type="text" id="native-name" placeholder="Native Name" value="<?php echo isset($_POST['native-name']) ? $_POST['native-name'] : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender">
                        <option value="">Select Gender</option>
                        <option value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="religion">Religion</label>
                    <input type="text" id="religion" placeholder="Religion" value="<?php echo isset($_POST['religion']) ? $_POST['religion'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="civil-status">Civil Status</label>
                    <select id="civil-status">
                        <option value="">Select Status</option>
                        <option value="single" <?php echo (isset($_POST['civil-status']) && $_POST['civil-status'] == 'single') ? 'selected' : ''; ?>>Single</option>
                        <option value="married" <?php echo (isset($_POST['civil-status']) && $_POST['civil-status'] == 'married') ? 'selected' : ''; ?>>Married</option>
                        <option value="divorced" <?php echo (isset($_POST['civil-status']) && $_POST['civil-status'] == 'divorced') ? 'selected' : ''; ?>>Divorced</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" value="<?php echo isset($_POST['birthday']) ? $_POST['birthday'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="birth-place">Place of Birth</label>
                    <input type="text" id="birth-place" placeholder="Place of Birth" value="<?php echo isset($_POST['birth-place']) ? $_POST['birth-place'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input type="text" id="nationality" placeholder="Nationality" value="<?php echo isset($_POST['nationality']) ? $_POST['nationality'] : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="birth-order">Birth Order</label>
                    <input type="text" id="birth-order" placeholder="Birth Order" value="<?php echo isset($_POST['birth-order']) ? $_POST['birth-order'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" placeholder="Email Address" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="mobile-number">Mobile Number</label>
                    <input type="text" id="mobile-number" placeholder="Mobile Number" value="<?php echo isset($_POST['mobile-number']) ? $_POST['mobile-number'] : ''; ?>">
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
