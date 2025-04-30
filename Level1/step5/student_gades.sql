/*- Create the following tables:
- students (id, name, class) 
- subjects (id, name)
- grades (id, student_id, subject_id, grade)
- Insert sample data (at least 3 students, 3 subjects, and grades for each).
- Write and submit SQL queries to:
- Get the average grade for each student.
- Get the highest and lowest grades in each subject.
- List all students who scored more than 85 in any subject.
*/

CREATE TABLE students(
    student_id INT PRIMARY KEY,
    name VARCHAR(50),
    class VARCHAR(1)
);

INSERT INTO students VALUES(200,'Mariam Emad','A');

ALTER TABLE students MODIFY student_id INT AUTO_INCREMENT;

INSERT INTO students(name,class) VALUES('Sara suliman','A');
INSERT INTO students(name,class) VALUES('Ahmed Mahmoud','A'),('Raneem Sherif','B'),
('Hesham Ibrahim','A'),('Youmna Ahmed','B'),
('Youssef Hashem','B'),('Mohammed Bakr','A'),
('Haneen Ashraf','B'),('Amany Yasser','A'),
('Moustafa Ahmed', 'B');

SELECT * FROM students;


CREATE TABLE subjects(
    subject_id INT PRIMARY KEY AUTO_INCREMENT,
    subject_name VARCHAR(30)
);

INSERT INTO subjects(subject_name) VALUES('Logic Design'),('Data Communication'),('Graghic Design'),('ARCH');

SELECT * FROM subjects;

CREATE TABLE grades(
    grade_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT ,
    subject_id INT,
    grade INT,
    FOREIGN KEY(student_id) REFERENCES students(student_id) ON DELETE CASCADE,
    FOREIGN KEY(subject_id) REFERENCES subjects(subject_id) ON DELETE CASCADE
);

INSERT INTO grades(student_id, subject_id, grade) VALUES
(200, 1, 85), (200, 2, 78), (200, 3, 92), (200, 4, 88),
(201, 1, 74), (201, 2, 81), (201, 3, 90), (201, 4, 69),
(202, 1, 100), (202, 2, 83), (202, 3, 77), (202, 4, 95),
(203, 1, 68), (203, 2, 87), (203, 3, 80), (203, 4, 62),
(204, 1, 83), (204, 2, 76), (204, 3, 84), (204, 4, 89),
(205, 1, 79), (205, 2, 70), (205, 3, 58), (205, 4, 82),
(206, 1, 96), (206, 2, 85), (206, 3, 74), (206, 4, 91),
(207, 1, 67), (207, 2, 88), (207, 3, 93), (207, 4, 76),
(208, 1, 82), (208, 2, 79), (208, 3, 86), (208, 4, 90),
(209, 1, 75), (209, 2, 42), (209, 3, 84), (209, 4, 83),
(210, 1, 77), (210, 2, 73), (210, 3, 95), (210, 4, 80);

/*get avg grade for each student */
    SELECT  students.name,AVG(grades.grade) AS 'avg grade'
    FROM students
    JOIN grades
    ON students.student_id=grades.student_id
    GROUP BY students.name;

    /*Get the highest and lowest grades in each subject*/
    SELECT subjects.subject_name,MAX(grades.grade) AS 'highest score',MIN(grades.grade) AS 'lowest score'
    FROM subjects
    JOIN grades
    ON grades.subject_id=subjects.subject_id
    GROUP BY subjects.subject_name;

    /*List all students who scored more than 85 in any subject*/
    SELECT students.name , grades.grade ,subjects.subject_name 
    FROM students 
    JOIN grades
    ON students.student_id=grades.student_id AND grades.grade>85
    JOIN subjects 
    ON subjects.subject_id=grades.subject_id;
