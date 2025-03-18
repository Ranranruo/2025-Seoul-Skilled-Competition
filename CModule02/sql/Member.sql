CREATE TABLE Member (
    idx BIGINT PRIMARY KEY AUTO_INCREMENT,
    id TEXT UNIQUE,
    password TEXT,
    name TEXT,
    email TEXT,
    join_date DATETIME DEFAULT CURRENT_TIME
);