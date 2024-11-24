CREATE DATABASE IF NOT EXISTS grades_management;

USE grades_management;

CREATE TABLE IF NOT EXISTS grade_encodings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exam_name VARCHAR(255) NOT NULL,
    encoding_start_date DATE NOT NULL,  
    encoding_end_date DATE NOT NULL,   
    faculty_employee_id VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
