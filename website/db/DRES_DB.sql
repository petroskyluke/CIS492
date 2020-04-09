DROP DATABASE IF EXISTS DRES_DB;
CREATE DATABASE DRES_DB;
USE DRES_DB;

CREATE TABLE agent (
  agent_ID	        INT            	NOT NULL   AUTO_INCREMENT,
  agent_fname		VARCHAR(50)		NOT NULL,
  agent_lname       VARCHAR(50)   	NOT NULL,
  agent_phone		VARCHAR(10)    	NOT NULL,
  agent_email       VARCHAR(255)    NOT NULL,
  agent_address     VARCHAR(255)    NOT NULL,
  PRIMARY KEY (agent_ID),
  UNIQUE INDEX agent_ID (agent_ID)
);


CREATE TABLE services_provided_and_scheduled	(
	project_ID					INT			NOT NULL AUTO_INCREMENT,
	project_status				BOOLEAN		NOT NULL,
	project_schedule_date		DATETIME 	NOT NULL,
	project_confirmation_date	DATETIME	NOT NULL,
	project_start_datetime		DATETIME	NOT NULL,
	project_end_datetime		DATETIME	NOT NULL,
	agent_ID					INT			NOT NULL,
	service_ID					INT			NOT NULL,
	PRIMARY KEY (project_ID),
	UNIQUE INDEX project_ID (project_ID),
	FOREIGN KEY (agent_ID) REFERENCES agent(agent_ID)
);

CREATE TABLE login (
	username	VARCHAR(255)	NOT NULL,
    password_	VARCHAR(255) 	NOT NULL,
    PRIMARY KEY (username)
);
CREATE TABLE packages (
	package_ID			INT			NOT NULL	AUTO_INCREMENT,
	package_name		VARCHAR(40)	NOT NULL,
	package_price		VARCHAR(40)	NOT NULL,
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
	addon_price			VARCHAR(255)	NOT NULL,
	addon_description	VARCHAR(255)	NOT NULL,
	PRIMARY KEY (addon_ID)
);

CREATE TABLE a_la_carte ( 
	a_la_carte_ID		INT				NOT NULL	AUTO_INCREMENT,
	a_la_carte_name		VARCHAR(255)	NOT NULL,
	a_la_carte_price	VARCHAR(255)	NOT NULL,
	a_la_carte_desc		VARCHAR(1024),
	PRIMARY KEY (a_la_carte_ID)
);

/*Add in information for the customer*/
CREATE TABLE orderform (
	form_ID				INT			NOT NULL		AUTO_INCREMENT,
	package_chosen		INT			NOT NULL,
	add_on1				BOOLEAN		NOT NULL,
	add_on2				BOOLEAN		NOT NULL,
	a_la_carte1			BOOLEAN		NOT NULL,
	a_la_carte2			BOOLEAN		NOT NULL,
	a_la_carte3			BOOLEAN		NOT NULL,
	a_la_carte4			BOOLEAN		NOT NULL,
	a_la_carte5			BOOLEAN		NOT NULL,	
	a_la_carte6			BOOLEAN		NOT NULL,	
	a_la_carte7			BOOLEAN		NOT NULL,
	a_la_carte8			BOOLEAN		NOT NULL,
	PRIMARY KEY (form_ID)
);
INSERT INTO login (username, password_) VALUES
('Josh', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO');

INSERT INTO packages (package_name,package_price) VALUES
('1st Package','$150'),
('2nd Package','$200'),
('3rd Package','$320');

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
('2D Floor Plans','$25','View the location as a floor plan'),
('Measurements of Rooms','$10','Receive room measurements/dimensions');

INSERT INTO a_la_carte (a_la_carte_name,a_la_carte_price,a_la_carte_desc) VALUES
('25 Professional Pictures','$70','Receive 25 pictures of the property from our expert photographer'),
('Drone Video (Outside Only)','$115','Receive video of the property from our drone'),
('Drone Video & Interior Video','$215','Receive video of both the outside and inside of the location'),
('Interior Video','$100','Receive video of the interior of the location'),
('Virtual Staging','$45/picture','Have the interior design edited using digital editing'),
('Sky and/or Grass Replacement','$8/picture','Have the Sky and/or Grass in the pictures replaces with pristine blues and greens using digital editing'),
('Twilight Picture Transformation','$10/picture','Have the pictures digitally edited to look as if they were taken among a beautiful twilight'),
('Measurements of All Rooms','$10','Receive the internal dimensions of each room');
