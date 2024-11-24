
CREATE DATABASE IF NOT EXISTS completion_list;

USE completion_list;

CREATE TABLE IF NOT EXISTS completion_of_grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    school_year VARCHAR(10) NOT NULL,
    term VARCHAR(50) NOT NULL,
    subject_code VARCHAR(50) NOT NULL,
    subject_name VARCHAR(100) NOT NULL,
    instructor VARCHAR(100) NOT NULL,
    status VARCHAR(50) NOT NULL
);

-- Insert Sample Data into completion_of_grades
INSERT INTO completion_of_grades (student_id, school_year, term, subject_code, subject_name, instructor, status)
VALUES
(1001, '2023-2024', '1st Semester', 'CS101', 'Introduction to Computer Science', 'Dr. John Smith', 'Completed'),
(1001, '2023-2024', '1st Semester', 'MATH101', 'Basic Mathematics', 'Prof. Jane Doe', 'In Progress'),
(1002, '2023-2024', '2nd Semester', 'ENG101', 'English Composition', 'Mr. Robert Brown', 'Pending'),
(1002, '2023-2024', '2nd Semester', 'BIO101', 'General Biology', 'Dr. Emily White', 'Completed'),
(1001, '2024-2025', '1st Semester', 'CS102', 'Data Structures', 'Dr. Alice Green', 'In Progress'),
(1001, '2024-2025', '1st Semester', 'HIST101', 'World History', 'Prof. Peter Black', 'Pending'),
(1003, '2024-2025', '2nd Semester', 'CHEM101', 'General Chemistry', 'Mr. James Grey', 'Completed'),
(1003, '2024-2025', '2nd Semester', 'CS201', 'Algorithms', 'Dr. Sarah Blue', 'In Progress'),
(1001, '2023-2024', '1st Semester', 'PHYS101', 'Physics I', 'Prof. Mark Red', 'Completed'),
(1003, '2023-2024', '2nd Semester', 'PSY101', 'Introduction to Psychology', 'Dr. Olivia Yellow', 'Pending');
