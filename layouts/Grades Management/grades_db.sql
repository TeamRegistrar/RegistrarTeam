CREATE DATABASE IF NOT EXISTS grades_db;
USE grades_db;

-- Students Table
CREATE TABLE IF NOT EXISTS students (
    student_id VARCHAR(10) PRIMARY KEY,
    studentName VARCHAR(100) NOT NULL,
    program VARCHAR(50) NOT NULL,
    studentYear INT NOT NULL
);

-- Sample data for students table
INSERT INTO students (student_id, studentName, program, studentYear) VALUES
('S001', 'John Doe', 'Computer Science', 2),
('S002', 'Jane Smith', 'Business Administration', 3);

-- Grades Table
CREATE TABLE IF NOT EXISTS grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(10) NOT NULL,
    subject_code VARCHAR(10) NOT NULL,
    subject_name VARCHAR(100) NOT NULL,
    credits_earned DECIMAL(3, 1) NOT NULL,
    instructor VARCHAR(100) NOT NULL,
    grade DECIMAL(3, 2) NOT NULL,
    remarks ENUM('Passed', 'Failed', 'Incomplete') NOT NULL,
    term ENUM('Midterm', 'Finals') NOT NULL,
    school_year VARCHAR(20) NOT NULL,
    semester ENUM('1st Semester', '2nd Semester') NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);

-- Sample Data for grades table
INSERT INTO grades (student_id, subject_code, subject_name, credits_earned, instructor, grade, remarks, term, school_year, semester) VALUES
('S001', 'CS101', 'Introduction to Programming', 3.0, 'Dr. Alan Turing', 1.25, 'Passed', 'Midterm', '2023-2024', '1st Semester'),
('S001', 'CS102', 'Data Structures', 4.0, 'Dr. Ada Lovelace', 1.50, 'Passed', 'Midterm', '2023-2024', '1st Semester'),
('S002', 'BA201', 'Financial Accounting', 3.0, 'Prof. Warren Buffett', 1.75, 'Passed', 'Finals', '2024-2025', '2nd Semester'),
('S002', 'BA202', 'Marketing Management', 3.0, 'Prof. Philip Kotler', 2.00, 'Failed', 'Finals', '2024-2025', '2nd Semester');
