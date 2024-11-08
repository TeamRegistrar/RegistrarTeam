<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data - General Qualification</title>
    <link rel="stylesheet" href="genQualification.css">
    <style>
        body {
            margin-left: 50px;
            margin-right: 50px;
            font-family: Arial, sans-serif;
            margin-top: 55px;
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
    <span class="current-page">General Qualification</span>
</div>
   
    <div class="header">
        <h2><?php echo "Modification of Data - General Qualification"; ?></h2>
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
                        <label for="languages">Languages:</label>
                        <input type="text" id="languages" name="languages" placeholder="Languages" value="<?php echo isset($_POST['languages']) ? $_POST['languages'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="hobbies">Hobbies:</label>
                        <input type="text" id="hobbies" name="hobbies" placeholder="Hobbies" value="<?php echo isset($_POST['hobbies']) ? $_POST['hobbies'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="skills">Skills:</label>
                        <input type="text" id="skills" name="skills" placeholder="Skills" value="<?php echo isset($_POST['skills']) ? $_POST['skills'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="talents">Talents:</label>
                        <input type="text" id="talents" name="talents" placeholder="Talents" value="<?php echo isset($_POST['talents']) ? $_POST['talents'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="sports">Sports:</label>
                        <input type="text" id="sports" name="sports" placeholder="Sports" value="<?php echo isset($_POST['sports']) ? $_POST['sports'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="honors">Honors / Awards / Merits (EX: "Model Student, 2020")</label>
                        <input type="text" id="honors" name="honors" placeholder="Honors / Awards / Merits" value="<?php echo isset($_POST['honors']) ? $_POST['honors'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="extra-curricular">Extra - Curricular Activities (ORGANIZATION, CLUB, ETC)</label>
                        <input type="text" id="extra-curricular" name="extra-curricular" placeholder="Extra-curricular Activities" value="<?php echo isset($_POST['extra-curricular']) ? $_POST['extra-curricular'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="why-this-program">Why Am I Taking This Program?</label>
                        <input type="text" id="why-this-program" name="why-this-program" placeholder="Why am I taking this program?" value="<?php echo isset($_POST['why-this-program']) ? $_POST['why-this-program'] : ''; ?>">
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
