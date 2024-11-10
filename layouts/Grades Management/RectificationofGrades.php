<?php
include 'config.php';
$studentId = '';
$studentInfo = [];
$grades = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST['studentId'];
    $term = $_POST['term'];
    $schoolYear = $_POST['schoolYear'];
    $semester = $_POST['semester'];

    //Get student information
    $studentInfoSql = "SELECT studentName, program, studentYear FROM students WHERE student_id = '$studentId'";
    $result = $conn->query($studentInfoSql);

    if ($result && $result->num_rows > 0) {
        $studentInfo = $result->fetch_assoc();
    }

    //Get grades
    $gradesSql = "SELECT subject_code, subject_name, credits_earned, instructor, grade 
              FROM grades 
              WHERE student_id = '$studentId' 
              AND term = '$term' 
              AND school_year = '$schoolYear' 
              AND semester = '$semester'";
    $gradesResult = $conn->query($gradesSql);

    if ($gradesResult && $gradesResult->num_rows > 0) {
        while ($row = $gradesResult->fetch_assoc()) {
            //Set remarks and credits based on the grade
            if ($row['grade'] == 0) {
                $row['remarks'] = 'Incomplete';
                $row['credits_earned'] = 0;
            } elseif ($row['grade'] > 3.0) {
                $row['remarks'] = 'Failed';
                $row['credits_earned'] = 0;
            } else {
                $row['remarks'] = 'Passed';
            }
            $grades[] = $row;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rectification of Grades</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/rescmreg/css/rectificationofgrades.css">
</head>

<body>
    <!-- Main content -->
    <div class="main-content p-6" id="mainContent">

        <section class="section-header mb-6 mt-4">
            <h1 class="text-2xl font-semibold">Rectification of Grades</h1>
        </section>

        <div class="main-content p-6" id="mainContent">
            <!-- Form Section -->
            <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-2">
                <form method="POST">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <!-- Term -->
                            <label for="term" class="block mb-2 text-sm font-medium text-black">Grades For:</label>
                            <select id="term" name="term" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" disabled selected hidden>Select</option>
                                <option value="Midterm">Midterm</option>
                                <option value="Finals">Finals</option>
                            </select>
                        </div>
                        <div>
                            <label for="schoolYear" class="block mb-2 text-sm font-medium text-black">School
                                Year:</label>
                            <select id="schoolYear" name="schoolYear" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" disabled selected hidden>Select</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <!-- Semester -->
                            <label for="semester" class="block mb-2 text-sm font-medium text-black">Semester:</label>
                            <select id="semester" name="semester" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" disabled selected hidden>Select</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                            </select>
                        </div>
                        <div>
                            <label for="studentId" class="block mb-2 text-sm font-medium text-black">Student ID:</label>
                            <input type="text" id="studentId" name="studentId" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                    </div>
                    <div class="mt-7">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceed</button>
                    </div>
                </form>
            </section>

            <!-- Student Information Section & Grades Table -->
            <?php if (!empty($studentInfo)) { ?>
                <section class="form-section mb-10 p-6 bg-white shadow-md rounded-lg mt-10">
                    <h2 class="text-xl font-bold mb-4">Student Information</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <label for="studentName" class="font-medium text-gray-900 dark:text-white w-1/5">Student
                                Name:</label>
                            <p class="w-2/3"><?= htmlspecialchars($studentInfo['studentName']) ?></p>
                        </div>
                        <div class="flex items-center">
                            <label for="program"
                                class="font-medium text-gray-900 dark:text-white w-1/4">Course/Major:</label>
                            <p class="w-2/3"><?= htmlspecialchars($studentInfo['program']) ?></p>
                        </div>
                        <div class="flex items-center">
                            <label for="studentYear" class="font-medium text-gray-900 dark:text-white w-1/5">Year:</label>
                            <p class="w-2/3"><?= htmlspecialchars($studentInfo['studentYear']) ?></p>
                        </div>
                    </div>

                    <!-- Grades Table Section -->
                    <table class="w-full text text-gray-500 mt-5">
                        <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr style="background-color: #012D5E; color: white;">
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Credits Earned</th>
                                <th>Instructor</th>
                                <th>Grade</th>
                                <th>Remarks</th>
                                <th> </th> <!--Header Purposes-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($grades as $grade) { ?>
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="text-center"><?= htmlspecialchars($grade['subject_code']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($grade['subject_name']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($grade['credits_earned']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($grade['instructor']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($grade['grade']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($grade['remarks']) ?></td>
                                    <!-- Edit Button -->
                                    <td class="text-center">
                                        <a href="EditRectification.php?studentName=<?= urlencode($studentInfo['studentName']) ?>&subject_code=<?= urlencode($grade['subject_code']) ?>&course=<?= urlencode($studentInfo['program']) ?>&year=<?= urlencode($studentInfo['studentYear']) ?>&grade=<?= urlencode($grade['grade']) ?>&credits_earned=<?= urlencode($grade['credits_earned']) ?>&remarks=<?= urlencode($grade['remarks']) ?>"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-medium text-xs px-2 py-1 rounded">Edit</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>


                    </table>
                </section>
            <?php } ?>
        </div>
</body>

</html>

<style>
    #student-info-section {
        display: none;
    }
    /* Section header */
    .section-header {
        background-color: #174069;
        padding: 20px;
        text-align: center;
        margin-bottom: 20px;
    }

    .section-header h1 {
        color: white;
        margin: 0;
    }
</style>
<script>
    //Toggle the visibility of the student info section
    function toggleStudentInfo() {
        const section = document.getElementById('student-info-section');
        section.style.display = section.style.display === 'none' ? 'block' : 'none';
    }
</script>