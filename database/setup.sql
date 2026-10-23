-- help me wa
CREATE DATABASE IF NOT EXISTS resume_lab CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE resume_lab;

DROP TABLE IF EXISTS git_training;
DROP TABLE IF EXISTS git_skill;
DROP TABLE IF EXISTS git_education;
DROP TABLE IF EXISTS git_profile;

CREATE TABLE git_profile (
 id INT AUTO_INCREMENT PRIMARY KEY,
 full_name VARCHAR(150) NOT NULL,
 headline VARCHAR(200), email VARCHAR(150), phone VARCHAR(30),
 address VARCHAR(255), about_me TEXT, photo VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE git_education (
 id INT AUTO_INCREMENT PRIMARY KEY, profile_id INT NOT NULL,
 degree VARCHAR(200) NOT NULL, institution VARCHAR(200) NOT NULL,
 start_year YEAR, end_year YEAR,
 CONSTRAINT fk_education_profile FOREIGN KEY (profile_id) REFERENCES git_profile(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE git_skill (
 id INT AUTO_INCREMENT PRIMARY KEY, profile_id INT NOT NULL,
 skill_name VARCHAR(120) NOT NULL, skill_level VARCHAR(50),
 CONSTRAINT fk_skill_profile FOREIGN KEY (profile_id) REFERENCES git_profile(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE git_training (
 id INT AUTO_INCREMENT PRIMARY KEY, profile_id INT NOT NULL,
 course_name VARCHAR(200) NOT NULL, organization VARCHAR(200), training_year YEAR,
 CONSTRAINT fk_training_profile FOREIGN KEY (profile_id) REFERENCES git_profile(id) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO git_profile (full_name, headline, email, phone, address, about_me, photo)
VALUES ('Student Name','Computer Science Student','student@example.com','08X-XXX-XXXX','Chonburi, Thailand','Interested in database and AI.','student.jpg');

INSERT INTO git_education (profile_id, degree, institution, start_year, end_year)
VALUES (1,'B.Sc. Computer Science','Burapha University',2024,2027),(1,'High School','Example School',2021,2023);

INSERT INTO git_skill (profile_id,skill_name,skill_level) VALUES (1,'PHP','Intermediate'),(1,'MySQL','Intermediate'),(1,'Git','Beginner');

INSERT INTO git_training (profile_id,course_name,organization,training_year)
VALUES (1,'Introduction to Web Development','Example Academy',2026),(1,'Database Fundamentals','Example Academy',2025);