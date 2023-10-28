CREATE DATABASE book_club;
CREATE TABLE login(
    login_id INT(100) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30),
    password VARCHAR(50) DEFAULT 'R1chField2023', 
    student_number INT(9),
    PRIMARY KEY (login_id)
)
CREATE TABLE books(
    book_id INT(100) NOT NULL AUTO_INCREMENT , 
    name_book VARCHAR(500) NOT NULL ,
    author_book VARCHAR(250) NOT NULL ,
    book_path VARCHAR(250) NOT NULL , 
    PRIMARY KEY (book_id)
    );