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

CREATE TABLE portfolio  (
  group_ID					INT			   	NOT NULL,
  media_ID					INT			   	NOT NULL,
  media_name				VARCHAR(50)	   	NOT NULL,
  media_location			VARCHAR(50)	   	NULL,
  media_file_location		VARCHAR(255)	NOT NULL, 
  media_type				VARCHAR(25)	 	NOT NULL,
  media_upload_datetime		DATETIME	   	NOT NULL,
  PRIMARY KEY (group_ID, media_ID)
);

CREATE TABLE services_available	(
	service_ID				INT 			NOT NULL	AUTO_INCREMENT,
	service_name			VARCHAR(50)		NOT NULL,
	service_description		VARCHAR(50)		NOT NULL,
	service_price			DOUBLE			NOT NULL,
	service_time			TIME			NOT NULL,
	media_type				VARCHAR(25)		NOT NULL,
	media_type_ID			INT				NOT NULL,	
	PRIMARY KEY (service_ID),
	UNIQUE INDEX service_ID (service_ID)
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
	FOREIGN KEY (agent_ID) REFERENCES agent(agent_ID),
	FOREIGN KEY (service_ID) REFERENCES services_available(service_ID)
);

CREATE TABLE login (
	username	VARCHAR(255)	NOT NULL,
    password_	VARCHAR(255) 	NOT NULL,
    PRIMARY KEY (username)
);

CREATE TABLE packages (
	package_ID			INT			NOT NULL	AUTO_INCREMENT,
	package_name		VARCHAR(25)	NOT NULL,
	package_price		VARCHAR(10)	NOT NULL,
	package_features	VARCHAR(255),
	PRIMARY KEY (package_ID)
);

CREATE TABLE add_ons (
	addon_ID	
	addon_name
	addon_price
	addon_description
);


CREATE TABLE orderform (
	form_ID	
	package_chosen
	add_on1	BOOLEAN
	add_on2	BOOLEAN
	....
	a_la_carte


);

INSERT INTO login (username, password_) VALUES
('Josh', '$2y$10$hACDPch1eJLxB5SQf3IsfOQiNSiLgm.J6YdQMZ8LYB45I6LozpOVO');
