CREATE DATABASE book_club;
CREATE TABLE login(
    login_id INT(100) NOT NULL,
    username VARCHAR(30),
    password VARCHAR(50) DEFAULT 'R1chField2023', 
    student_number INT(9),
    PRIMARY KEY (login_id)
);