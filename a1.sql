CREATE TABLE customer (
    cno SERIAL PRIMARY KEY,
    cname VARCHAR(50),
    city VARCHAR(50)
);

CREATE TABLE orders (
    ono SERIAL PRIMARY KEY,
    odate DATE,
    shipping_address VARCHAR(100),
    cno INT REFERENCES customer(cno)
);

INSERT INTO customer (cname, city)
VALUES
('Rohit', 'Pune'),
('Virat', 'Mumbai'),
('Dhoni', 'Ranchi');

INSERT INTO orders (odate, shipping_address, cno)
VALUES
('2026-09-20', 'Pune', 1),
('2026-09-21', 'Mumbai', 2),
('2026-09-22', 'Ranchi', 3),
('2026-09-23', 'Pune', 1);

SELECT * FROM customer;
SELECT * FROM orders;

CREATE TABLE category (
    cid SERIAL PRIMARY KEY,
    cname VARCHAR(50)
);

INSERT INTO category (cname)
VALUES
('Electronics'),
('Clothing'),
('Books'),
('Food'),
('Sports');

CREATE TABLE product (
    pid SERIAL PRIMARY KEY,
    pname VARCHAR(50),
    price NUMERIC(10,2),
    quantity INT
);

INSERT INTO product (pname, price, quantity)
VALUES
('Laptop', 50000, 10),
('Mobile', 20000, 20),
('Keyboard', 1500, 30);

select * from category; 

CREATE TABLE teacher (
    tno SERIAL PRIMARY KEY,
    tname VARCHAR(50),
    qualification VARCHAR(50),
    salary NUMERIC(10,2)
);

INSERT INTO teacher (tname, qualification, salary)
VALUES
('Ramesh', 'MCA', 45000),
('Suresh', 'MSc', 50000),
('Priya', 'MTech', 60000);