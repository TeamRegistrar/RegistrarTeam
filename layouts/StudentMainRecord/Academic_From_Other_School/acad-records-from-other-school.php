<?php
// Define the current page
$current_page = 'Academic From Other School'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Academic From Other School' => '/rescmreg/layouts/StudentMainRecord/Academic_From_Other_School/acad-records-from-other-school.php' 
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Records from other School</title>
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/rescmreg/layouts/StudentMainRecord/Academic_From_Other_School/academic.css">
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
        <div class="header text-center">
            <h4>Academic Records from other School</h4>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label for="studentNumber" class="input-group-text bg-white text-dark"><strong>Student Number:</strong></label>
                    <input type="text" class="form-control" id="studentNumber" placeholder="Enter Student Number">
                    <button class="btn" type="button" style="background-color: #003366; color: white;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <label for="documentSelect" class="form-label"><strong>Select Document:</strong></label>
                <select class="form-select" id="documentSelect">
                    <option value="" disabled selected>Select</option>
                    <option value="form137">Form 137</option>
                    <option value="form138">Form 138</option>
                    <option value="goodmoral">Certificate of Good Moral Character</option>
                    <option value="birthcert">Birth Certificate</option>
                </select>
            </div>
        </div>

        <div class="row justify-content-center align-items-center mt-4">
            <div class="col-md-6 text-center">
                <img id="documentImage" src="" alt="Selected Document Image" style="max-width: 100%; display: none;" />
            </div>
        </div>
    </div>
    
    <script src="scripts.js"></script>
</body>
</html>
