CREATE TABLE IF NOT EXISTS users (
 id INT NOT NULL AUTO_INCREMENT,
 balance DECIMAL(10,2) DEFAULT 0,
 username VARCHAR(50) NOT NULL,
 password VARCHAR(255) NOT NULL,
 phonenumber VARCHAR(20) NOT NULL,
 paymentmethod VARCHAR(50) NOT NULL,
 PRIMARY KEY (id)
);

INSERT INTO users (balance, username, password, phonenumber, paymentmethod)
VALUES (100.00, 'JohnDoe', 'password123', '555-555-5555', 'Credit Card');

CREATE TABLE IF NOT EXISTS admin (
 id INT NOT NULL AUTO_INCREMENT,
 username VARCHAR(50) NOT NULL,
 balance DECIMAL(10,2) DEFAULT 0,
 paymentmethod VARCHAR(50) NOT NULL,
 users VARCHAR(255) NOT NULL,
 PRIMARY KEY (id)
);

INSERT INTO admin (username, balance, paymentmethod, users)
VALUES ('adminUser', 1000.00, 'PayPal', 'JohnDoe, JaneSmith, BobJohnson');

CREATE TABLE IF NOT EXISTS mngr (
 id INT NOT NULL AUTO_INCREMENT,
 admins VARCHAR(255) NOT NULL,
 users VARCHAR(255) NOT NULL,
 balance DECIMAL(10,2) DEFAULT 0,
 PRIMARY KEY (id)
);

INSERT INTO mngr (admins, users, balance)
VALUES ('adminUser1, adminUser2', 'JohnDoe, JaneSmith, BobJohnson', 5000.00);

CREATE TABLE IF NOT EXISTS game (
 id INT NOT NULL AUTO_INCREMENT,
 room VARCHAR(50) NOT NULL,
 price DECIMAL(10,2) DEFAULT 0,
 user_id INT NOT NULL,
 admin_id INT NOT NULL,
 date DATE NOT NULL,
 PRIMARY KEY (id),
 FOREIGN KEY (user_id) REFERENCES users (id),
 FOREIGN KEY (admin_id) REFERENCES admin (id)
);

INSERT INTO game (room, price, user_id, admin_id, date)
VALUES ('Room 1', 10.00, 1, 2, '2023-06-03');
