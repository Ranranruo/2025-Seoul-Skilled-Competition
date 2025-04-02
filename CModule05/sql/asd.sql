-- DROP TABLE Member;
CREATE TABLE Member (
    idx INT PRIMARY KEY AUTO_INCREMENT,
    id TEXT UNIQUE,
    name TEXT,
    password TEXT,
    email TEXT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO Member (id, name, password, email) VALUES ('admin', '관리자', '1111', 'admin@admin.com');
-- DROP TABLE Notice;
CREATE TABLE Notice (
    idx INT PRIMARY KEY AUTO_INCREMENT,
    type TEXT,
    text TEXT,
    date DATE DEFAULT CURRENT_DATE
);
-- DROP TABLE Product;
CREATE TABLE Product (
    idx INT PRIMARY KEY AUTO_INCREMENT,
    name TEXT,
    description TEXT,
    img TEXT,
    price TEXT,
    sale TEXT
);
-- DROP TABLE Cart;
CREATE TABLE Cart (
    idx INT PRIMARY KEY AUTO_INCREMENT,
    memberId INT,
    productId INT
);

