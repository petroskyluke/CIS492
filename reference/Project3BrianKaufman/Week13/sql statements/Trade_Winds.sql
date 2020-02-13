-- create and select the database
DROP DATABASE IF EXISTS Trade_Winds;
CREATE DATABASE Trade_Winds;
USE Trade_Winds;

-- create the tables for the database
CREATE TABLE customers (
  customerID        INT            NOT NULL   AUTO_INCREMENT,
  company			VARCHAR(50)				  DEFAULT NULL,
  emailAddress      VARCHAR(255)   NOT NULL,
  password			VARCHAR(60)    NOT NULL,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  PRIMARY KEY (customerID),
  UNIQUE INDEX emailAddress (emailAddress)
);

CREATE TABLE addresses  (
  addressID			INT			   NOT NULL	  AUTO_INCREMENT,
  customerID		INT			   NOT nULL,
  line1				VARCHAR(60)	   NOT NULL,
  line2				VARCHAR(60)				  DEFAULT NULL,
  city				VARCHAR(60)    NOT NULL,
  state				VARCHAR(2)	   NOT NULL,
  zipCode			VARCHAR(6)	   NOT NULL,
  phone				VARCHAR(12)	   NOT NULL,
  PRIMARY KEY(addressID),
  INDEX customerID(customerID),
  FOREIGN KEY(customerID) REFERENCES customers(customerID)
);


CREATE TABLE employees (
  employeeID		INT			   NOT NULL   AUTO_INCREMENT,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  emailAddress      VARCHAR(255)   NOT NULL,
  password			VARCHAR(60)	   NOT NULL,
  phoneNumber		VARCHAR(25)    NOT NULL,
  address			VARCHAR(255)   NOT NULL,
  city				VARCHAR(60)    NOT NULL,
  PRIMARY KEY (employeeID),
  UNIQUE INDEX emailAddress (emailAddress)
);

CREATE TABLE suppliers (
  supplierID		INT			   NOT NULL   AUTO_INCREMENT,
  company			VARCHAR(50)    NOT NULL,
  firstName         VARCHAR(60)               DEFAULT NULL,
  lastName          VARCHAR(60)               DEFAULT NULL,
  emailAddress      VARCHAR(255)   NOT NULL,
  password			VARCHAR(60)	   NOT NULL,
  phoneNumber		VARCHAR(25)    NOT NULL,
  address			VARCHAR(255)   NOT NULL,
  city				VARCHAR(60)    NOT NULL,
  state				VARCHAR(2)	   NOT NULL,
  zipCode			VARCHAR(6)	   NOT NULL,
  PRIMARY KEY (supplierID),
  UNIQUE INDEX emailAddress (emailAddress)
);

CREATE TABLE products (
  productID         INT            NOT NULL   AUTO_INCREMENT,
  supplierID		INT			   NOT NULL,
  productCode       VARCHAR(10)    NOT NULL,
  productName       VARCHAR(255)   NOT NULL,
  listPrice         DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (productID), 
  UNIQUE INDEX productCode (productCode),
  FOREIGN KEY (supplierID) REFERENCES suppliers(supplierID)
);

CREATE TABLE orders (
  orderID           INT            NOT NULL   AUTO_INCREMENT,
  customerID        INT            NOT NULL,
  employeeID        INT            NOT NULL,
  orderDate         DATETIME       NOT NULL,
  shipDate			DATETIME				  DEFAULT NULL,
  shipAmount        DECIMAL(10,2)  NOT NULL,
  taxAmount         DECIMAL(10,2)  NOT NULL,
  paymentType       CHAR(16)       NOT NULL,
  PRIMARY KEY (orderID), 
  INDEX customerID (customerID),
  FOREIGN KEY (customerID) REFERENCES customers(customerID),
  FOREIGN KEY (employeeID) REFERENCES employees(employeeID)
);

CREATE TABLE orderItems (
  itemID			INT			   NOT NULL   AUTO_INCREMENT,
  orderID			INT			   NOT NULL,
  productID			INT			   NOT NULL,
  itemPrice			DECIMAL(10,2)  NOT NULL,
  quantity			INT			   NOT NULL,
  PRIMARY KEY (itemID),
  INDEX orderID(orderID),
  INDEX produtID(productID),
  FOREIGN KEY (orderID) REFERENCES orders(orderID),
  FOREIGN KEY (productID) REFERENCES products (productID)
);

CREATE TABLE administrators (
  adminID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (adminID)
);

-- Insert data into the tables

INSERT INTO customers (customerID, company, emailAddress, password, firstName, lastName) VALUES
(1, 'Company A', 'companya@yahoo.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Anna', 'Bedecs'),
(2, 'Company B', 'comapnyb@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Solsona', 'Gratacos'),
(3, 'Company C', 'comapnyc@yahoo.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Thomas', 'Axen'),
(4, 'Company D', 'comapnyd@outlook.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Christina', 'Lee'),
(5, 'Company E', 'comapnye@hotmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Martin', 'ODonnell'),
(6, 'Company F', 'comapnyf@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Francisco', 'Perez-Olata'),
(7, 'Company G', 'comapnyg@yahoo.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Ming-Yang', 'Xie'),
(8, 'Company H', 'comapnyh@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Elizabeth', 'Andersen'),
(9, 'Company I', 'comapnyi@yahoo.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Sven', 'Mortensen'),
(10, 'Company J', 'comapnyj@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', 'Brian', 'Kaufman');


INSERT INTO addresses(addressID, customerID, line1, line2, city, state, zipCode, phone) VALUES
(1, 1, '123 1st Street', '', 'Charleroi', 'PA', '15022', '724-435-4434'),
(2, 2, '123 2nd Street', '', 'Greensburg', 'PA', '15601', '724-887-4434'),
(3, 3, '123 3rd Street', '', 'Pittsburgh', 'PA', '18901', '412-444-4554'),
(4, 4, '123 4th Street', '', 'Townly', 'WA', '45638', '320-435-3987'),
(5, 5, '123 5th Street', '', 'Broley', 'GA', '34523', '578-948-5434'),
(6, 6, '123 6th Street', '', 'Stagia', 'TX', '66890', '758-435-6748'),
(7, 7, '123 7th Street', '', 'Cheif', 'OH', '20453', '345-578-3458'),
(8, 8, '123 8th Street', '', 'Townsten', 'WA', '45648', '320-489-4378'),
(9, 9, '123 9th Street', '', 'Townsburg', 'IL', '54678', '587-578-2679'),
(10, 10, '200 Elvic Lane', '', 'Towny', 'CO', '11229', '654-367-7969');

INSERT INTO employees (employeeID, firstName, lastName, emailAddress, password, phoneNumber, address, city) VALUES
(1, 'Nancy', 'Freehafer', 'freehafernancy@gmail.com', '650215acec746f0e32bdfff387439eefc1358737', '7246459865', '123 1st Avenue', 'Seattle'),
(2, 'Andrew', 'Cencini', 'cenciniandrew@yahoo.com', '3f563468d42a448cb1e56924529f6e7bbe529cc7', '7216566565', '123 2nd Avenue', 'Bellevue'),
(3, 'Jan', 'Kotas', 'kotasjan@gmail.com', 'ed19f5c0833094026a2f1e9e6f08a35d26037066', '7246459865', '123 3rd Avenue', 'Redmond'),
(4, 'Mariya', 'Sergienko', 'sergienkomariya@gmail.com', '$2y$10$hCeGPizORF8mgvmMg0iX/OACx/AD8WoWombq38Weirlc6Jh8lHVhy', '7246459865', '123 4th Avenue', 'Kirkland'),
(5, 'Steven', 'Thorpe', 'thorpesteven@gmail.com', '$2y$10$eKmGs0PvLtUprgJDaJy/8eOdI6gzr9BzHS6t25/87e9bPU5ftaDti', '7246459865', '123 5th Avenue', 'Seattle'),
(6, 'Michael', 'Neipper', 'neippermichael@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7246459865', '123 6th Avenue', 'Redmond'),
(7, 'Robert', 'Zare', 'zarerobert@gmail.com', '$2y$10$Q0O887rW5P8NtaJ/7B6smO8k/JrQL4UF/tiIhZ5EoAxsU59sDziDa', '7246459865', '123 7th Avenue', 'Seattle'),
(8, 'Laura', 'Giussani', 'giussanilaura@gmail.com', '$2y$10$g2L8ZSh3UX5gbwn1hULq/eTLTFhARbhltigvNZVmKOT/EDX9QwP4m', '7246459865', '123 8th Avenue', 'Redmond'),
(9, 'Anne', 'Hellung-Larsen', 'hellunglarsenanne@gmail.com', '$2y$10$8frTRRepxF31HjrNzbfDLecQiuJCyo0TpL4lRqQUz7UE8IskuUO0e', '7246459865', '123 9th Avenue', 'Seattle'),
(10, 'Brian', 'Kaufman', 'kaumfmanbrian@gmail.com', '$2y$10$U5bIJGAP4ZdpvbVcYex2WOE1EfJLf1omsgzMbiaDcY0PRRMmCHX5m', '7246459865', '123 10th Avenue', 'Greensburg'),
(11, 'Test', 'Test', 'test@test.com',  '$2y$10$U5bIJGAP4ZdpvbVcYex2WOE1EfJLf1omsgzMbiaDcY0PRRMmCHX5m', '7249456463', '123 11th Avenue', 'Greensburg');


INSERT INTO suppliers (supplierID, company, firstName, lastName, emailAddress, password, phoneNumber, address, city, state, zipCode) VALUES
(1, 'Company A', 'Elizabeth', 'Anderson', 'companya@yahoo.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Kingsmond', 'PA', '15601'),
(2, 'Company B', 'Cornelia', 'Weiler', 'comapnyb@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Diamond', 'PA', '15601'),
(3, 'Company C', 'Madeleine', 'Kelley', 'comapnyc@yahoo.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Sespar', 'PA', '15601'),
(4, 'Company D', 'Naoki', 'Sato', 'comapnyd@outlook.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Kingsmond', 'PA', '15601'),
(5, 'Company E', 'Amaya', 'Hernandez', 'comapnye@hotmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Sespar', 'PA', '15601'),
(6, 'Company F', 'Satomi', 'Hayakawa', 'comapnyf@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Wumbo', 'PA', '15601'),
(7, 'Company G', 'Stuart', 'Glasson', 'comapnyg@yahoo.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Kingsmond', 'PA', '15601'),
(8, 'Company H', 'Bryn', 'Dunton', 'comapnyh@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Kingsmond', 'PA', '15601'),
(9, 'Company I', 'Mikael', 'Sandberg', 'comapnyi@yahoo.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Diamond', 'PA', '15601'),
(10, 'Company J', 'Luis', 'Sousa', 'comapnyj@gmail.com', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO', '7245654845', '785 Industrial Street', 'Kingsmond', 'PA', '15601');


INSERT INTO products (productID, supplierID, productCode, productName, listPrice) VALUES
(1, 1, 'NWTB-1', 'Northwind Traders Chai', '13.50'),
(2, 1, 'NWTCO-3', 'Northwind Traders Syrup', '7.50'),
(3, 1, 'NWTCO-4', 'Northwind Traders Cajun Seasoning', '16.50'),
(4, 1, 'NWTO-5', 'Northwind Traders Olive Oil', '16.05'),
(5, 1, 'NWTJP-6', 'Northwind Traders Boysenberry Spread', '18.75'),
(6, 1, 'NWTDFN-7', 'Northwind Traders Dried Pears', '22.50'),
(7, 1, 'NWTS-8', 'Northwind Traders Curry Sauce', '30.00'),
(8, 2, 'NWTDFN-14', 'Northwind Traders Walnuts', '17.75'),
(9, 2, 'NWTCFV-17', 'Northwind Traders Fruit Cocktail', '29.25'),
(10, 2, 'NWTBGM-19', 'Northwind Traders Chocolate Biscuits Mix', '6.90'),
(11, 2, 'NWTJP-67', 'Northwind Traders Marmalade', '60.75'),
(12, 2, 'NWTBGM-21', 'Northwind Traders Scones', '7.50'),
(13, 2, 'NWTB-34', 'Northwind Traders Beer', '10.50'),
(14, 2, 'NWTCM-40', 'Northwind Traders Crab Meat', '13.80'),
(15, 2, 'NWTSO-41', 'Northwind Traders Clam Chowder', '7.75'),
(16, 2, 'NWTB-43', 'Northwind Traders Coffee', '34.50'),
(17, 2, 'NWTCA-48', 'Northwind Traders Chocolate', '9.25'),
(18, 2, 'NWTDFN-51', 'Northwind Traders Dried Apples', '39.75'),
(19, 2, 'NWTG-52', 'Northwind Traders Long Grain Rice', '5.25'),
(20, 2, 'NWTP-56', 'Northwind Traders Gnocchi', '28.50'),
(21, 2, 'NWTP-57', 'Northwind Traders Ravioli', '14.65'),
(22, 2, 'NWTS-65', 'Northwind Traders Hot Pepper Sauce', '15.75'),
(23, 2, 'NWTS-66', 'Northwind Traders Tomato Sauce', '12.75'),
(24, 3, 'NWTD-72', 'Northwind Traders Mozzarella', '26.10'),
(25, 3, 'NWTDFN-74', 'Northwind Traders Almonds', '7.50'),
(26, 3, 'NWTCO-77', 'Northwind Traders Mustard', '9.75'),
(27, 3, 'NWTDFN-80', 'Northwind Traders Dried Plums', '3.00'),
(28, 3, 'NWTB-81', 'Northwind Traders Green Tea', '2.00'),
(29, 4, 'NWTC-82', 'Northwind Traders Granola', '2.00'),
(30, 4, 'NWTCS-83', 'Northwind Traders Potato Chips', '.50'),
(31, 5, 'NWTBGM-85', 'Northwind Traders Brownie Mix', '9.00'),
(32, 6, 'NWTBGM-86', 'Northwind Traders Cake Mix', '10.50'),
(33, 6, 'NWTB-87', 'Northwind Traders Tea', '2.00'),
(34, 7, 'NWTCFV-88', 'Northwind Traders Pears', '1.00'),
(35, 8, 'NWTCFV-89', 'Northwind Traders Peaches', '1.00'),
(36, 8, 'NWTCFV-90', 'Northwind Traders Pineapple', '1.00'),
(37, 9, 'NWTCFV-91', 'Northwind Traders Cherry Pie Filling', '1.00'),
(38, 9, 'NWTCFV-92', 'Northwind Traders Green Beans', '1.00'),
(39, 10, 'NWTCFV-93', 'Northwind Traders Corn', '1.00'),
(40, 10, 'NWTCFV-94', 'Northwind Traders Peas', '1.00'),
(41, 10, 'NWTCM-95', 'Northwind Traders Tuna Fish', '.50'),
(42, 10, 'NWTCM-96', 'Northwind Traders Smoked Salmon', '2.00'),
(43, 10, 'NWTC-83', 'Northwind Traders Hot Cereal', '3.00'),
(44, 10, 'NWTSO-98', 'Northwind Traders Vegetable Soup', '1.00'),
(45, 10, 'NWTSO-99', 'Northwind Traders Chicken Soup', '1.00');


INSERT INTO orders (orderID, customerID, employeeID, orderDate, shipDate, shipAmount, taxAmount, paymentType) VALUES
(1, 1, 1, '2017-06-01 11:23:20', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(2, 1, 1, '2017-06-01 11:23:20', '2017-06-01 11:23:20', '9.99', '12.99', 'not paid'),
(3, 2, 1, '2017-06-01 11:23:20', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(238, 1, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(239, 3, 10,'2006-01-22 00:00:00', '2017-06-01 11:23:20','9.99', '12.99', 'paid'),
(240, 4, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20','9.99', '12.99', 'paid'),
(241, 5, 4, '2006-01-22 00:00:00',  '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(242, 6, 10, '2006-01-22 00:00:00',  '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(243, 7, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(244, 8, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(245, 1, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(246, 7, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(247, 9, 2, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(248, 2, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(249, 10, 2, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(250, 3, 6, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(251, 4, 10,'2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(252, 4, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(253, 3, 10, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(254, 8, 10, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(255, 5, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(256, 5, 10, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(257, 6, 10, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(258, 7, 8, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(259, 6, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(260, 6, 8, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(261, 2, 4, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(262, 4, 2, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(263, 7, 6, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(264, 8, 5, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(265, 10, 1, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(266, 3, 10, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(267, 9, 3, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(268, 4, 2, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(269, 4, 3, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(270, 8, 1, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(271, 1, 2, '2006-01-22 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(272, 3, 3, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(273, 9, 10, '2006-04-17 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(274, 1, 5, '2006-04-06 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(275, 7, 1, '2006-04-05 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(276, 2, 5, '2006-04-05 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(277, 4, 3, '2006-04-05 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(278, 8, 2, '2006-04-05 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(279, 9, 5, '2006-04-05 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(280, 3, 2, '2006-04-10 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(281, 1, 4, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(282, 9, 2, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(283, 4, 5, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(285, 3, 5, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(286, 4, 4, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(288, 5, 1, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(289, 6, 1, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(290, 10, 1, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(292, 2, 4, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(293, 5, 4, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(294, 4, 10, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid'),
(295, 7, 4, '2006-04-04 00:00:00', '2017-06-01 11:23:20', '9.99', '12.99', 'paid');


INSERT INTO orderItems (itemID, orderID, productID, itemPrice, quantity) VALUES
(1, 1, 2, '399.00', 1),
(2, 2, 4, '699.00', 1),
(3, 238, 1, '39.99',1),
(4, 239,45, '39.99',1),
(5, 240,32, '39.99',1),
(6, 241,34, '39.99',1),
(7, 242,23, '39.99',1),
(8, 243,12, '39.99',1),
(9, 244,23, '39.99',1),
(10,245,34, '39.99',1),
(11,246, 1, '39.99',1),
(12,247, 2, '39.99',1),
(13,248, 4, '39.99',1),
(14,249, 5, '39.99',1),
(15,250, 3, '39.99',1),
(16,251, 6, '39.99',1),
(17,252, 7, '39.99',1),
(18,253, 8, '39.99',1),
(19,254, 9, '39.99',1),
(20,255, 19, '39.99',1),
(21,256, 6, '39.99',1),
(22,257, 38, '39.99',1),
(23,258, 29, '39.99',1),
(24,259, 18, '39.99',1),
(25,260, 39, '39.99',1),
(26,261, 28, '39.99',1),
(27,262, 37, '39.99',1),
(28,263, 27, '39.99',1),
(29,264, 26, '39.99',1),
(30,265, 15, '39.99',1),
(31,266, 16, '39.99',1),
(32,267, 27, '39.99',1),
(33,268, 37, '39.99',1),
(34,269, 26, '39.99',1),
(35,270, 3, '39.99',1),
(36,271, 4, '39.99',1),
(37,272, 5, '39.99',1),
(38,273, 12, '39.99',1),
(39,274, 11, '39.99',1),
(40,275, 21, '39.99',1),
(41,276, 23, '39.99',1),
(42,277, 24, '39.99',1),
(43,278, 32, '39.99',1),
(44,279, 12, '39.99',1),
(45,280, 1, '39.99',1),
(46,281, 43, '39.99',1),
(47,282, 33, '39.99',1),
(48,283, 22, '39.99',1),
(49,285, 11, '39.99',1),
(50,286, 34, '39.99',1),
(51,288, 4, '39.99',1),
(52,289, 3, '39.99',1),
(53,290, 2, '39.99',1),
(54,292, 7, '39.99',1),
(55,293, 5, '39.99',1),
(56,294, 3, '39.99',1),
(57,295, 2 , '39.99',1),
(58, 3, 2, '29.99',1);

INSERT INTO administrators (adminID, emailAddress, password, firstName, lastName) VALUES
(1, 'admin@myguitarshop.com', '6a718fbd768c2378b511f8249b54897f940e9022', 'Admin', 'User'),
(2, 'joel@murach.com', '971e95957d3b74d70d79c20c94e9cd91b85f7aae', 'Joel', 'Murach'),
(3, 'mike@murach.com', '3f2975c819cefc686282456aeae3a137bf896ee8', 'Mike', 'Murach');

