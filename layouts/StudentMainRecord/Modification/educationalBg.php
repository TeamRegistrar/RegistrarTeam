<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - Educational Background</title>
    <link rel="stylesheet" href="educationalBg.css">
</head>
<body>
   <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <a href="/rescmreg/index.php">Dashboard</a>
    <span>&gt;</span>
    <a href="/rescmreg/layouts/StudentMainRecord/Modification/modification.php">Modification of Data</a>
    <span>&gt;</span>
    <span class="current-page">Educational Background</span>
</div>

    <div class="header">
        <h2><?php echo "Modification of Data - Educational Background"; ?></h2>
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
                <h3>Elementary</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="elementary-name">Name:</label>
                        <select id="elementary-name" name="elementary-name">
                            <option value="">Select</option>
                            <!-- Options for schools can be added here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="elementary-program">Program:</label>
                        <input type="text" id="elementary-program" name="elementary-program" placeholder="Program" value="<?php echo isset($_POST['elementary-program']) ? $_POST['elementary-program'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="elementary-year-graduated">Year Graduated:</label>
                        <input type="date" id="elementary-year-graduated" name="elementary-year-graduated" value="<?php echo isset($_POST['elementary-year-graduated']) ? $_POST['elementary-year-graduated'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="elementary-honors">Honors / Award:</label>
                        <input type="text" id="elementary-honors" name="elementary-honors" placeholder="Honors / Award" value="<?php echo isset($_POST['elementary-honors']) ? $_POST['elementary-honors'] : ''; ?>">
                    </div>
                </div>

                <h3>High School</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="highschool-name">Name:</label>
                        <select id="highschool-name" name="highschool-name">
                            <option value="">Select</option>
                            <!-- Options for schools can be added here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="highschool-program">Program:</label>
                        <input type="text" id="highschool-program" name="highschool-program" placeholder="Program" value="<?php echo isset($_POST['highschool-program']) ? $_POST['highschool-program'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="highschool-year-graduated">Year Graduated:</label>
                        <input type="date" id="highschool-year-graduated" name="highschool-year-graduated" value="<?php echo isset($_POST['highschool-year-graduated']) ? $_POST['highschool-year-graduated'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="highschool-honors">Honors / Award:</label>
                        <input type="text" id="highschool-honors" name="highschool-honors" placeholder="Honors / Award" value="<?php echo isset($_POST['highschool-honors']) ? $_POST['highschool-honors'] : ''; ?>">
                    </div>
                </div>

                <h3>College</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="college-name">Name:</label>
                        <select id="college-name" name="college-name">
                            <option value="">Select</option>
                            <!-- Options for schools can be added here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="college-program">Program:</label>
                        <input type="text" id="college-program" name="college-program" placeholder="Program" value="<?php echo isset($_POST['college-program']) ? $_POST['college-program'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="college-year-graduated">Year Graduated:</label>
                        <input type="date" id="college-year-graduated" name="college-year-graduated" value="<?php echo isset($_POST['college-year-graduated']) ? $_POST['college-year-graduated'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="college-honors">Honors / Award:</label>
                        <input type="text" id="college-honors" name="college-honors" placeholder="Honors / Award" value="<?php echo isset($_POST['college-honors']) ? $_POST['college-honors'] : ''; ?>">
                    </div>
                </div>

                <h3>Post Graduate</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="postgrad-name">Name:</label>
                        <select id="postgrad-name" name="postgrad-name">
                            <option value="">Select</option>
                            <!-- Options for schools can be added here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postgrad-program">Program:</label>
                        <input type="text" id="postgrad-program" name="postgrad-program" placeholder="Program" value="<?php echo isset($_POST['postgrad-program']) ? $_POST['postgrad-program'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="postgrad-year-graduated">Year Graduated:</label>
                        <input type="date" id="postgrad-year-graduated" name="postgrad-year-graduated" value="<?php echo isset($_POST['postgrad-year-graduated']) ? $_POST['postgrad-year-graduated'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="postgrad-honors">Honors / Award:</label>
                        <input type="text" id="postgrad-honors" name="postgrad-honors" placeholder="Honors / Award" value="<?php echo isset($_POST['postgrad-honors']) ? $_POST['postgrad-honors'] : ''; ?>">
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
