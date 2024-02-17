CREATE DATABASE IF NOT EXISTS GrandeLinci;

USE GrandeLinci;
CREATE TABLE color
( id INT AUTO_INCREMENT PRIMARY KEY,
 code_name VARCHAR(2) NOT NULL UNIQUE,
 name VARCHAR(50) NOT NULL);
 
CREATE TABLE pattern
(id INT AUTO_INCREMENT PRIMARY KEY,
code_name INT NOT NULL UNIQUE,
name VARCHAR(50) NOT NULL);
  
CREATE TABLE sex
(id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(6) NOT NULL);
   
CREATE TABLE cats
(id INT AUTO_INCREMENT PRIMARY KEY,
 name varchar(50) NOT NULL,
 date_of_birth DATE NOT NULL,
 id_color INT NOT NULL,
 id_pattern INT,
 id_sex INT NOT NULL,
 description TEXT,
 titles VARCHAR(255),
 tests VARCHAR(255),
 img_path VARCHAR(255),
 FOREIGN KEY (id_color) REFERENCES color (id),
 FOREIGN KEY (id_pattern) REFERENCES pattern (id),
 FOREIGN KEY (id_sex) REFERENCES sex (id));
  
CREATE TABLE kittens
(id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(50) NOT NULL,
 price INT NOT NULL DEFAULT 0,
 id_sex INT NOT NULL,
 age INT NOT NULL,
 id_mother INT NOT NULL,
 id_father INT NOT NULL,
 id_color INT NOT NULL,
 id_pattern INT,
 img_path VARCHAR(255),
 FOREIGN KEY (id_mother) REFERENCES cats (id),
 FOREIGN KEY (id_father) REFERENCES cats (id),
 FOREIGN KEY (id_color) REFERENCES color (id),
 FOREIGN KEY (id_pattern) REFERENCES pattern (id));
 
CREATE TABLE booking_request
(id INT AUTO_INCREMENT PRIMARY KEY,
 user_name VARCHAR(50) NOT NULL,
 email VARCHAR(100) NOT NULL,
 phone_number VARCHAR(15) NOT NULL,
 id_kitten INT NOT NULL,
 question1 TEXT NOT NULL, 
 question2 TEXT NOT NULL,
 question3 TEXT,  
 question4 TEXT, 
 FOREIGN KEY (id_kitten) REFERENCES kittens (id));

CREATE TABLE pages(
                      page_id SMALLINT PRIMARY KEY AUTO_INCREMENT,
                      page_alias VARCHAR(255),
                      page_meta_d VARCHAR(255),
                      page_meta_k VARCHAR(255),
                      page_publish CHAR DEFAULT 'Y'
)