-- Create the database
CREATE DATABASE IF NOT EXISTS grades_management;

-- Select the database
USE grades_management;

-- Create the faculty_grades_status table
CREATE TABLE faculty_grades_status (
    record_id INT(11) AUTO_INCREMENT PRIMARY KEY,  -- New primary key column
    faculty_id INT(6) NOT NULL,                    -- Faculty ID, not primary key
    faculty_name VARCHAR(100) NOT NULL,
    college_dept_code VARCHAR(50) NOT NULL,
    status VARCHAR(10) NOT NULL,
    students_enrolled INT NOT NULL,
    students_with_grade INT NOT NULL,
    subject_code VARCHAR(50) NOT NULL,
    section VARCHAR(10) NOT NULL,
    term VARCHAR(50) NOT NULL,
    start_year DATE NOT NULL,                      -- Changed to DATE
    end_year DATE NOT NULL,                        -- Changed to DATE
    UNIQUE (faculty_id)                            -- Make faculty_id a unique key if needed
);

-- Modify the 'status' column to increase its size
ALTER TABLE faculty_grades_status 
MODIFY COLUMN status VARCHAR(50) NOT NULL;
