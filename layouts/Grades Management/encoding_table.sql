-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS grades_management;

-- Select the database
USE grades_management;

-- Create the faculty_grades_status table
CREATE TABLE faculty_grades_status (
    record_id INT(11) AUTO_INCREMENT PRIMARY KEY,  -- New primary key column
    faculty_id INT(6) NOT NULL,                    -- Faculty ID, not primary key
    faculty_name VARCHAR(100) NOT NULL,
    college_dept_code VARCHAR(50) NOT NULL,
    status VARCHAR(50) NOT NULL,                   -- Adjusted column size to 50
    students_enrolled INT NOT NULL,
    students_with_grade INT NOT NULL,
    subject_code VARCHAR(50) NOT NULL,
    section VARCHAR(10) NOT NULL,
    term VARCHAR(50) NOT NULL,
    start_year DATE NOT NULL,                      -- Changed to DATE
    end_year DATE NOT NULL,                        -- Changed to DATE
    UNIQUE (faculty_id)                            -- Make faculty_id a unique key if needed
);

-- Insert sample data into the faculty_grades_status table
INSERT INTO faculty_grades_status 
(faculty_id, faculty_name, college_dept_code, status, students_enrolled, students_with_grade, subject_code, section, term, start_year, end_year)
VALUES
(20023, 'John Doe', 'College of Engineering', 'Not Verified', 50, 40, 'ENG101', 'A', '1st Year', '2021-04-13', '2021-05-13'),
(20024, 'Jane Smith', 'College of Science', 'Verified', 55, 50, 'BIO102', 'B', '2nd Year', '2021-06-10', '2021-07-10'),
(20025, 'Robert Brown', 'College of Arts', 'Encoded', 60, 58, 'ART103', 'C', '1st Year', '2021-08-15', '2021-09-15'),
(20026, 'Emily White', 'College of Business', 'Not Encoded', 45, 43, 'BUS104', 'D', '3rd Year', '2022-01-05', '2022-02-05'),
(20027, 'Michael Green', 'College of Engineering', 'Not Verified', 50, 25, 'PHY105', 'E', '2nd Year', '2022-03-01', '2022-04-01'),
(20028, 'Susan Black', 'College of Education', 'Verified', 40, 0, 'EDU106', 'F', '4th Year', '2022-05-15', '2022-06-15'),
(20029, 'Daniel Lee', 'College of Engineering', 'Encoded', 70, 68, 'ENG107', 'G', '3rd Year', '2022-07-10', '2022-08-10'),
(20030, 'Jessica King', 'College of Science', 'Not Verified', 30, 20, 'CHE108', 'H', '1st Year', '2023-02-20', '2023-03-20'),
(20031, 'David Scott', 'College of Arts', 'Verified', 65, 63, 'HIS109', 'I', '4th Year', '2023-04-05', '2023-05-05'),
(20032, 'Laura Martinez', 'College of Business', 'Not Encoded', 40, 15, 'MGT110', 'J', '2nd Year', '2023-09-01', '2023-10-01'),
(20033, 'Chris Wilson', 'College of Education', 'Encoded', 55, 54, 'EDU111', 'K', '3rd Year', '2024-01-10', '2024-02-10'),
(20034, 'Patricia Davis', 'College of Engineering', 'Verified', 35, 33, 'MAT112', 'L', '1st Year', '2024-03-20', '2024-04-20'),
(20035, 'Mark Taylor', 'College of Science', 'Not Verified', 45, 0, 'PHY113', 'M', '2nd Year', '2024-05-15', '2024-06-15'),
(20036, 'Linda Roberts', 'College of Arts', 'Encoded', 50, 49, 'ART114', 'N', '3rd Year', '2024-07-01', '2024-08-01'),
(20037, 'James Anderson', 'College of Business', 'Not Encoded', 60, 30, 'ACC115', 'O', '4th Year', '2024-09-10', '2024-10-10');
