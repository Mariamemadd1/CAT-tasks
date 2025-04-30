/*- Create the following tables:
- books (id, title, author, published_year, available_copies)
- members (id, name, email, join_date)
- borrowings (id, member_id, book_id, borrow_date, return_date)
- Insert at least 5 records in each table.
- Write and submit SQL queries to:
- Show all borrowed books with member names.
- Count how many books each member has borrowed.
- Show books that were borrowed in the last 30 days
*/
CREATE TABLE books(
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50),
    author VARCHAR(50),
    published_year YEAR,
    available_copies INT
);

INSERT INTO books(title,author,published_year,available_copies) VALUES('THe Nun','William andrew',2020,4),('Maze Runner','James Clear',2015,1)
,('Love rosie','Micheal matt',2012,3),('Back To Hell','Tara Westover',2018,6),
('The Midnight Library', 'Matt Haig', 2021, 7),('The Silent Patient', 'Alex Michaelides', 2022, 4);

CREATE TABLE members(
    member_id INT PRIMARY KEY,
    member_name VARCHAR(50),
    member_email VARCHAR(50),
    join_date DATE
);

INSERT INTO members VALUES(100,'Lara andrew','lara11@gmail.com','2020-01-11');

ALTER TABLE members MODIFY member_id INT AUTO_INCREMENT;

INSERT INTO members (member_name, member_email, join_date) VALUES
('Alice Johnson', 'alice.johnson@example.com', '2022-01-15'),
('Brian Smith', 'brian.smith@example.com', '2021-11-03'),
('Cynthia Lee', 'cynthia.lee@example.com', '2023-03-22'),
('David Kim', 'david.kim@example.com', '2022-06-09'),
('Emma Davis', 'emma.davis@example.com', '2024-02-18');


CREATE TABLE borrowings(
    borrow_id INT PRIMARY KEY AUTO_INCREMENT,
    member_id INT ,
    book_id INT,
    borrow_date DATE,
    return_date DATE,
    FOREIGN KEY (member_id) REFERENCES members(member_id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE
);

INSERT INTO borrowings (member_id, book_id, borrow_date, return_date) VALUES
(100, 1, '2022-03-01', '2022-03-15'),(101, 2, '2024-03-05', '2024-03-20'),
(102, 3, '2025-04-10', '2025-04-15'),(103, 4, '2020-03-12', '2020-03-25'),
(104, 5, '2025-03-15','2025-04-10' ),(105, 6, '2023-03-18', '2023-04-01');

INSERT INTO borrowings (member_id, book_id, borrow_date, return_date) VALUES(100,2,'2020-03-12', '2020-03-25');

/*  Show all borrowed books with member names */
SELECT borrow_id ,members.member_name, books.title 
FROM borrowings
JOIN  members
ON borrowings.member_id=members.member_id
JOIN books
ON borrowings.book_id=books.book_id;

/*Count how many books each member has borrowed*/

SELECT COUNT(borrowings.borrow_id) AS '# of Books borrowed' , members.member_name
FROM borrowings
JOIN members
ON borrowings.member_id=members.member_id
GROUP BY members.member_name;

/*Show books that were borrowed in the last 30 days*/
SELECT borrowings.borrow_date , books.title
FROM borrowings
JOIN books
ON books.book_id=borrowings.book_id;
