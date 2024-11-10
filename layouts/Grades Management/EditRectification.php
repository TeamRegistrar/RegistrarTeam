<?php
include 'config.php';

//Retrieve parameters from RectificationOfGrades.php
$studentName = isset($_GET['studentName']) ? $_GET['studentName'] : '';
$subjectCode = isset($_GET['subject_code']) ? $_GET['subject_code'] : '';
$course = isset($_GET['course']) ? $_GET['course'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';
$grade = isset($_GET['grade']) ? $_GET['grade'] : '';
$creditsEarned = isset($_GET['credits_earned']) ? $_GET['credits_earned'] : '';
$remarks = isset($_GET['remarks']) ? $_GET['remarks'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Catch updated values from the form
    $newGrade = $_POST['newGrade'];
    $newRemarks = $_POST['newRemarks'];
    $newCreditsEarned = $_POST['newCreditsEarned'];

    //Update the values in the database
    $updateSql = "UPDATE grades SET grade = '$newGrade', remarks = '$newRemarks', credits_earned = '$newCreditsEarned'
                  WHERE student_id = (SELECT student_id FROM students WHERE studentName = '$studentName')
                  AND subject_code = '$subjectCode'";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: RectificationOfGrades.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $studentId = $_GET['studentId'];
    $subject_code = $_GET['subject_code'];

    //Catch the current grade and other information
    $gradeQuery = "SELECT grade, credits_earned FROM grades WHERE student_id = '$studentId' AND subject_code = '$subject_code'";
    $result = $conn->query($gradeQuery);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentGrade = $row['grade'];
        $currentCredits = $row['credits_earned'];

        //Remarks calculation base on grades
        if ($currentGrade == 0) {
            $remarks = 'Incomplete';
        } elseif ($currentGrade > 3.0) {
            $remarks = 'Failed';
        } else {
            $remarks = 'Passed';
        }

    } else {
        //No data purposes
        $currentGrade = '';
        $remarks = '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Grades</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/rescmreg/css/rectificationofgrades.css">
</head>

<body>
    <!--Main content-->
    <div class="main-content p-6" id="mainContent">

        <div class="container mx-auto px-4 py-3">
            <section class="form-section mb-10 p-5 bg-white shadow-md rounded-lg mt-5">
                <div class="mt-2">
                    <h2 class="text-xl font-bold mb-4">Student Information</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="studentName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student
                                Name:</label>
                            <input type="text" id="studentName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="<?php echo htmlspecialchars($studentName); ?>" disabled>
                        </div>
                        <div>
                            <label for="courseMajor"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course/Major:</label>
                            <input type="text" id="courseMajor"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="<?php echo htmlspecialchars($course); ?>" disabled>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 mt-4">
                        <div>
                            <label for="year"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year:</label>
                            <input type="text" id="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="<?php echo htmlspecialchars($year); ?>" disabled>
                        </div>
                    </div>
                </div>


                <div class="mt-8">
                    <form method="POST" action="">
                        <h3 class="text-lg font-bold mb-4">Grade Details</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="gradeInRecord"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade in
                                    Record:</label>
                                <input type="text" id="gradeInRecord"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo htmlspecialchars($grade); ?>" disabled>
                            </div>
                            <div>
                                <label for="newGrade"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                    Grade:</label>
                                <input type="text" id="newGrade" name="newGrade"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="remarksInRecord"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks in
                                    Record:</label>
                                <input type="text" id="remarksInRecord"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo htmlspecialchars($remarks); ?>" disabled>
                            </div>
                            <div>
                                <label for="newRemarks"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                    Remarks:</label>
                                <select id="newRemarks" name="newRemarks"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled selected hidden>Select an option</option>
                                    <option value="Passed">Passed</option>
                                    <option value="Failed">Failed</option>
                                    <option value="Incomplete">Incomplete</option>
                                </select>
                            </div>

                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="creditsEarnedInRecord"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credits Earned
                                    in Record:</label>
                                <input type="text" id="creditsEarnedInRecord"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo htmlspecialchars($creditsEarned); ?>" disabled>
                            </div>
                            <div>
                                <label for="newCreditsEarned"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Credits
                                    Earned:</label>
                                <input type="text" id="newCreditsEarned" name="newCreditsEarned"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="reasonForChanges"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason for
                                    Changes:</label>
                                <textarea id="reasonForChanges"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    rows="3"></textarea>
                            </div>
                            <div>
                                <label for="date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date:</label>
                                <input type="date" id="date"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>

                        <!-- BUTTONS -->
                        <div class="grid grid-cols-2 gap-4 items-center mt-10">
                            <div class="flex justify-between w-full">
                                <button type="submit" class="text-sm font-medium text-green-700 dark:text-white">Click
                                    to Save Changes</button>
                                <a href="RectificationOfGrades.php"
                                    class="text-sm font-medium text-red-700 dark:text-white">Click to Cancel Edit</a>
                            </div>
                        </div>
                    </form>

                </div>
        </div>
    </div>
    </div>

    <!--Autofill remarks base on grade-->
    <script>
        document.getElementById("newGrade").addEventListener("input", function () {
            var newGrade = this.value.trim();
            var remarksField = document.getElementById("newRemarks");

            if (newGrade === "0") {
                remarksField.value = "Incomplete";
            } else if (!isNaN(newGrade) && parseFloat(newGrade) > 3.0) {
                remarksField.value = "Failed";
            } else if (!isNaN(newGrade) && parseFloat(newGrade) <= 3.0) {
                remarksField.value = "Passed";
            } else {
                remarksField.value = ""; //Clear Remarks
            }
        });

    </script>
</body>

</html>