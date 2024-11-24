CREATE DATABASE IF NOT EXISTS grades_final_report;

USE grades_final_report;

CREATE TABLE faculty (
    faculty_id VARCHAR(10) PRIMARY KEY,  -- Custom ID for faculty (e.g., F0001)
    faculty_name VARCHAR(100) NOT NULL,
    college_dept_code VARCHAR(50) NOT NULL,
    UNIQUE (faculty_name)
);

CREATE TABLE students (
    student_id VARCHAR(10) PRIMARY KEY,  -- Custom ID for students (e.g., ST0001)
    student_name VARCHAR(100) NOT NULL,
    year INT(2) NOT NULL,  
    credits_earned INT NOT NULL,  
    UNIQUE (student_name)
);

-- Creating table for storing grades reports
CREATE TABLE grades_report (
    report_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  -- Primary key for grades_report table
    faculty_id VARCHAR(10) NOT NULL,  -- Reference to faculty (e.g., F0001)
    student_id VARCHAR(10) NOT NULL,  -- Reference to student (e.g., ST0001)
    student_name VARCHAR(100) NOT NULL,
    midterm_grade DECIMAL(5,2),
    final_grade DECIMAL(5,2),
    remarks VARCHAR(100),
    semester VARCHAR(20) NOT NULL,  -- E.g., "1st Semester" or "2nd Semester"
    school_year VARCHAR(10) NOT NULL,  -- E.g., "2023-2024"
    subject_title VARCHAR(100) NOT NULL,  -- E.g., "Mathematics 101"
    section VARCHAR(20) NOT NULL,  -- E.g., "A", "B", etc.
    FOREIGN KEY (faculty_id) REFERENCES faculty(faculty_id),
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    UNIQUE (faculty_id, student_id, semester, school_year, subject_title)
);


INSERT INTO faculty (faculty_id, faculty_name, college_dept_code)
VALUES ('F0001', 'Dr. John Doe', 'CS Dept'), 
       ('F0002', 'Prof. Jane Smith', 'IT Dept');


INSERT INTO students (student_id, student_name, year, credits_earned)
VALUES ('ST0001', 'Alice Johnson', 2, 45), 
       ('ST0002', 'Bob Lee', 3, 90);


INSERT INTO grades_report (faculty_id, student_id, student_name, midterm_grade, final_grade, remarks, semester, school_year, subject_title, section)
VALUES ('F0001', 'ST0001', 'Alice Johnson', 85.5, 90.0, 'Passed', '1st Semester', '2023-2024', 'Mathematics 101', 'A'),
       ('F0002', 'ST0002', 'Bob Lee', 88.0, 92.5, 'Passed', '2nd Semester', '2023-2024', 'Physics 102', 'B');
