-- Create Database
CREATE DATABASE FacultyGradesDB;

-- Use the database
USE FacultyGradesDB;

-- Create Table with updated structure
CREATE TABLE grades_unlocking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    school_year VARCHAR(9) NOT NULL,
    term VARCHAR(20) NOT NULL,
    faculty_id VARCHAR(50) NOT NULL,
    subject_code VARCHAR(50),
    subject_name VARCHAR(100),
    section VARCHAR(10),
    status ENUM('locked', 'unlocked') DEFAULT 'locked'
);

CREATE TABLE IF NOT EXISTS unlocking_grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    student_name VARCHAR(255) NOT NULL,
    section VARCHAR(50) NOT NULL,
    status ENUM('locked', 'unlocked') DEFAULT 'locked'
);

-- Sample data insertion
INSERT INTO grades_unlocking (school_year, term, faculty_id, subject_code, subject_name, section, status)
VALUES 
('2023-2024', '1st Semester', 'F001', 'CS101', 'Introduction to Computer Science', 'A', 'locked'),
('2023-2024', '1st Semester', 'F002', 'MATH201', 'Calculus I', 'B', 'locked'),
('2023-2024', '2nd Semester', 'F003', 'PHYS202', 'Physics II', 'C', 'locked');

INSERT INTO grades_unlocking (school_year, term, faculty_id, subject_code, subject_name, section, status)
VALUES 
('S001', 'CS101', 'Introduction to Computer Science', 'A', 'locked'),
('S002', 'MATH201', 'Calculus I', 'B', 'locked'),
('S003', 'PHYS202', 'Physics II', 'C', 'locked');
