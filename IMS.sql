CREATE DATABASE IMS;
USE IMS;
CREATE TABLE User(
user_id int(10) NOT NULL AUTO_INCREMENT,
username varchar(20) NOT NULL UNIQUE,
first_name varchar(30),
last_name varchar(30),
password varchar(30) NOT NULL,
phone_no varchar(10),
email varchar(40),
PRIMARY KEY(user_id)
) ENGINE=InnoDB;
 CREATE TABLE Shop(
shop_id varchar(20) NOT NULL,
user_id int(10) NOT NULL,
shop_name varchar(30) NOT NULL,
shop_add varchar(60),
PRIMARY KEY(shop_id),
FOREIGN KEY(user_id) REFERENCES User(user_id)
) ENGINE=InnoDB;
CREATE TABLE Employee(
emp_id int(15) NOT NULL AUTO_INCREMENT,
shop_id varchar(20) NOT NULL,
username varchar(20) NOT NULL UNIQUE,
first_name varchar(30),
last_name varchar(30),
password varchar(30) NOT NULL,
phone_no varchar(10),
email varchar(40),
post varchar(15),
PRIMARY KEY(emp_id),
FOREIGN KEY(shop_id) REFERENCES Shop(shop_id)
) ENGINE=InnoDB;
DESC User;
DESC Shop;
DESC Employee;
SELECT * FROM Shop;
SELECT * FROM User;
SELECT * FROM Employee;
CREATE TABLE Product(
product_id int(30) NOT NULL AUTO_INCREMENT, 
shop_id varchar(20) NOT NULL,
product_name varchar(30) NOT NULL,
category varchar(20),
quantity varchar(5),
ws_price double(6,2),
selling_price double(6,2),
date_arrival date,
PRIMARY KEY(product_id),
FOREIGN KEY(shop_id) REFERENCES Shop(shop_id)
) ENGINE=InnoDB;

CREATE TABLE Purchase(
purchase_id int(40) NOT NULL AUTO_INCREMENT,
product_id int(30) NOT NULL,
purchase_date date,
quantity varchar(5),
PRIMARY KEY(purchase_id),
FOREIGN KEY(product_id) REFERENCES Product(product_id)
) ENGINE=InnoDB;

SELECT * FROM User;
SELECT * FROM Employee;
SELECT * FROM Shop;
DESC Product;
DESC Purchase;
DESC Supplier;
SELECT * FROM Product;
SELECT * FROM Purchase;
SELECT Product.product_name, SUM(Purchase.quantity) AS total_quantity FROM Purchase JOIN Product ON Purchase.product_id=Product.product_id WHERE Product.shop_id='823ddc8c92ac39ecc068' GROUP BY Product.product_name ORDER BY total_quantity;
INSERT INTO Product(shop_id, product_name, category, quantity, ws_price, selling_price, date_arrival) VALUES ('823ddc8c92ac39ecc068','Colgate','toothpaste',9, 40.00, 60.00, 2024-11-06);
INSERT INTO Product(shop_id, product_name, category, quantity, ws_price, selling_price, date_arrival) VALUES ('823ddc8c92ac39ecc068','Pepsodent','toothpaste',7, 45.00, 70.00, 2024-11-06);
INSERT INTO Product(shop_id, product_name, category, quantity, ws_price, selling_price, date_arrival) VALUES ('823ddc8c92ac39ecc068','Sensodyne','toothpaste',4, 35.00, 50.00, 2024-11-02);
INSERT INTO Purchase(product_id, purchase_date, quantity) VALUES (2, 2024-11-19,2);
INSERT INTO Purchase(product_id, purchase_date, quantity) VALUES (3, 2024-11-19,3);
INSERT INTO Purchase(product_id, purchase_date, quantity) VALUES (4, 2024-11-19,1);