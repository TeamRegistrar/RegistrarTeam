-- Create the database
CREATE DATABASE IF NOT EXISTS grades_management;

-- Use the database
USE grades_management;

-- Create the table for grade encoding
CREATE TABLE IF NOT EXISTS grade_encodings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exam_name VARCHAR(255) NOT NULL,
    encoding_start_date DATE NOT NULL,  -- Start date for encoding
    encoding_end_date DATE NOT NULL,    -- End date for encoding
    faculty_employee_id VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
