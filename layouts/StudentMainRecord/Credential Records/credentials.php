<?php
// Define the current page
$current_page = 'Credential Records'; // Set this to the title of the current page
$breadcrumbs = [
    'Dashboard' => '/rescmreg/index.php', 
    'Credential Records' => '/rescmreg/layouts/StudentMainRecord/Credential Records/credentials.php' 
];
?>
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

    <script src="js/credpg2.js" defer></script> 
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
            <h2>Credential Records</h2>
        </div>


        <div class="inner-container p-4">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">

                    <div class="input-group mb-3">
                        <label for="studentNumber" class="input-group-text bg-white text-dark"><strong>Student Number:</strong></label>
                        <input type="text" class="form-control" id="studentNumber" placeholder="Enter Student Number">
                        <button class="btn" type="button" style="background-color: #003366; color: white;">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <button class="btn btn-primary w-100" style="background-color: #003366; color: white;" type="button" onclick="goToCredentialsPage()">Proceed</button>
                </div>
            </div>
        </div>
    </div>
    <script>    
        function goToCredentialsPage() {
            window.location.href = "/rescmreg/layouts/StudentMainRecord/Credential Records/credentials2.0.php";
        }
    document.addEventListener('DOMContentLoaded', function() {
        // Select the breadcrumb container
        const breadcrumbContainer = document.querySelector('.breadcrumbs');

        // Add event listener to 'Update' button to add breadcrumb item
        document.querySelector('.change-btn[data-breadcrumb]').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the breadcrumb name from the data attribute
            const breadcrumbName = this.getAttribute('data-breadcrumb');

            // Generate the new breadcrumb item
            const newBreadcrumb = `<a href="${this.href}">${breadcrumbName}</a>`;

            // Append new breadcrumb to container with separator
            breadcrumbContainer.innerHTML += ` &gt; ${newBreadcrumb}`;

            // Redirect to the actual link after updating the breadcrumb
            setTimeout(() => {
                window.location.href = this.href;
            }, 100); // Small delay to visually update breadcrumbs first
        });
    });
</script>
</body>
</html>
