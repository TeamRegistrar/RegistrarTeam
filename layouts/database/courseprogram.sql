CREATE DATABASE IF NOT EXISTS curriculum_maintenance;

-- Select the database
USE curriculum_maintenance;

CREATE TABLE colleges (
    id INT(11) NOT NULL AUTO_INCREMENT,
    college_code VARCHAR(20) NOT NULL,
    college_name VARCHAR(225) NOT NULL,
    dean VARCHAR(125) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE crudforcp (
    id INT(11) NOT NULL,
    order_no int(125) NOT NULL AUTO_INCREMENT,
    course_code VARCHAR(125) NOT NULL,
    course_name VARCHAR(125) NOT NULL,
    PRIMARY KEY (order_no)
);
