CREATE TABLE users (
  user_id int(7) PRIMARY KEY AUTO_INCREMENT,
  user_username varchar(22) UNIQUE NOT NULL,
  user_email varchar(30) UNIQUE NOT NULL,
  user_fullname varchar(20)
);

CREATE TABLE students (
  user_id int(7) PRIMARY KEY,
  student_image varchar(255) UNIQUE
);

CREATE TABLE system_users (
  user_id int(7) PRIMARY KEY,
  user_role varchar(10) NOT NULL
);

CREATE TABLE courses (
  course_id int(7) PRIMARY KEY AUTO_INCREMENT,
  course_name varchar(22) UNIQUE NOT NULL,
  course_description blob,
  course_image varchar(255)
);