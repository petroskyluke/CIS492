DROP DATABASE IF EXISTS DRES_DB;
CREATE DATABASE DRES_DB;
USE DRES_DB;

CREATE TABLE login (
	username	VARCHAR(255)	NOT NULL,
    password_	VARCHAR(255) 	NOT NULL,
    PRIMARY KEY (username)
);
CREATE TABLE packages (
	package_ID			INT			NOT NULL	AUTO_INCREMENT,
	package_name		VARCHAR(40)	NOT NULL,
	package_price		DOUBLE		NOT NULL,
	PRIMARY KEY (package_ID)
);

CREATE TABLE package_features (
	package_feature_ID			INT	NOT NULL AUTO_INCREMENT,
	package_feature_name		VARCHAR(255),
	package_feature_desc		VARCHAR(1024),
	package_ID					INT	NOT NULL,
	PRIMARY KEY (package_feature_ID),
	FOREIGN KEY (package_ID) REFERENCES packages(package_ID)
);
CREATE TABLE add_ons (
	addon_ID			INT				NOT NULL	AUTO_INCREMENT,
	addon_name			VARCHAR(255)	NOT NULL,
	addon_price			DOUBLE			NOT NULL,
	addon_description	VARCHAR(255)	NOT NULL,
	PRIMARY KEY (addon_ID)
);

CREATE TABLE a_la_carte ( 
	a_la_carte_ID		INT				NOT NULL	AUTO_INCREMENT,
	a_la_carte_name		VARCHAR(255)	NOT NULL,
	a_la_carte_price	DOUBLE			NOT NULL,
	a_la_carte_desc		VARCHAR(1024),
	PRIMARY KEY (a_la_carte_ID)
);

/*Add in information for the customer*/
CREATE TABLE order_form (
	order_form_ID		INT				NOT NULL		AUTO_INCREMENT,
	first_name			VARCHAR(50)		NULL,
	last_name			VARCHAR(50)		NULL,
	package_chosen		INT				NOT NULL,
	addon_boxes_selected	VARCHAR(1024),
	a_la_carte_boxes_selected	VARCHAR(1024),
	email				VARCHAR(50)		NOT NULL,
	phone				VARCHAR(50)		NOT NULL,
	requested_date		DATE			NOT NULL,
	address1 			VARCHAR(50)		NOT NULL,
	address2			VARCHAR(50),
	city				VARCHAR(50)		NOT NULL,
	province_state		VARCHAR(50)		NOT NULL,
	zip_code			VARCHAR(10)		NOT NULL,
	PRIMARY KEY (order_form_ID)
);
/*
CREATE TABLE addon_detail (
	addon_detail_ID		INT			NOT NULL 		AUTO_INCREMENT,
	addon_ID			INT			NOT NULL,
	order_form_ID		INT			NOT NULL,
)*/
INSERT INTO login (username, password_) VALUES
('Josh', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO'),
('Kris', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO'),
('Luke', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO'),
('Brian', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO');

INSERT INTO packages (package_name,package_price) VALUES
('1st Package','150.00'),
('2nd Package','200.00'),
('3rd Package','320.00');

INSERT INTO package_features (package_feature_name,package_feature_desc, package_ID) VALUES
('Matterport 3D Showcase','Have a 3D tour created', 1),
('VR Capability','Use VR to view the 3D tour', 1),
('Measuring Capability','Measure distances in the 3D tour', 1),
('Tour','View the 3D tour', 1),
('Mattertags (10)','Embed the tour', 1),

('Matterport 3D Showcase','Have a 3D tour created', 2),
('VR Capability','Use VR to view the 3D tour', 2),
('Measuring Capability','Measure distances in the 3D tour', 2),
('Tour','View the 3D tour', 2),
('25 Professional Pictures','Receive 25 pictures of the property from our expert photographer', 2),
('Mattertags (15)','Embed the tour', 2),

('Matterport 3D Showcase','Have a 3D tour created', 3),
('VR Capability','Use VR to view the 3D tour', 3),
('Measuring Capability','Measure distances in the 3D tour', 3),
('Tour','View the 3D tour', 3),
('25 Professional Pictures','Receive 25 pictures of the property from our expert photographer', 3),
('Drone Video','Have video taken of the property with our drone', 3),
('Interior Video (+$50)','Receive video of the interior of the location for an addiontial fee', 3),
('2D Floor Plans','View the location as a floor plan', 3),
('Mattertags (20)','Embed the tour', 3);


INSERT INTO add_ons (addon_name,addon_price,addon_description) VALUES
('2D Floor Plans','25.00','View the location as a floor plan'),
('Measurements of Rooms','10.00','Receive room measurements/dimensions');

INSERT INTO a_la_carte (a_la_carte_name,a_la_carte_price,a_la_carte_desc) VALUES
('25 Professional Pictures','70.00','Receive 25 pictures of the property from our expert photographer'),
('Drone Video (Outside Only)','115.00','Receive video of the property from our drone'),
('Drone Video & Interior Video','215.00','Receive video of both the outside and inside of the location'),
('Interior Video','100.00','Receive video of the interior of the location'),
('Virtual Staging','45.00','Have the interior design edited using digital editing'),
('Sky and/or Grass Replacement','8.00','Have the Sky and/or Grass in the pictures replaces with pristine blues and greens using digital editing'),
('Twilight Picture Transformation','10.00','Have the pictures digitally edited to look as if they were taken among a beautiful twilight'),
('Measurements of All Rooms','10.00','Receive the internal dimensions of each room');
