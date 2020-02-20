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
  group_ID					INT			   	NOT NULL	  AUTO_INCREMENT,
  media_ID					INT			   	NOT NULL,
  media_name				VARCHAR(50)	   	NOT NULL,
  media_location			VARCHAR(50)	   	NOT NULL,
  media_file_location		VARCHAR(100)	NOT NULL, 
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
<<<<<<< HEAD:website/db/DRES_DB.sql
<<<<<<< HEAD:website/db/TEST_DATABASE_1.sql
	media_type				VARCHAR(25)		NOT NULL,
=======
	media_type_ID			INT				NOT NULL,/*why does services available need this?*/
>>>>>>> e5a5c4a7835c9556836b794d299e574afef3bbc7:website/db/DRES_DB.sql
=======
	media_type_ID			INT				NOT NULL,/*why does services available need this?*/
>>>>>>> e1bf07a3dc8b392624818bf2fc51f97a535f45eb:website/db/TEST_DATABASE_1.sql
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

<<<<<<< HEAD:website/db/DRES_DB.sql
CREATE TABLE login (
	username	VARCHAR(32)	NOT NULL,
    password_	VARCHAR(32) NOT NULL,
    PRIMARY KEY (username)
);
=======

INSERT INTO agent (agent_fname, agent_lname, agent_phone, agent_email, agent_address) VALUES
('Kris', 'Stewart', '7246892416', 'ste1145@calu.edu', '250 University AVE');

INSERT INTO media_type (media_type_ID, media_type_description) VALUES
(1, 'photo');

INSERT INTO portfolio (group_ID, media_ID, media_name, media_location, media_fil_location, media_type_ID, media_upload_datetime) VALUES
(1, 1, 'Test', 'put a location here', 'im not sure what this is', 1, '2020-02-13 11:45:00');

INSERT INTO services_available(service_ID, service_name, service_description, service_price, service_time, media_type_ID) VALUES
(1, 'Photography', 'i took pictures', 100.00, '11:45:00', 1);

INSERT INTO services_provided_and_scheduled (project_ID, project_status, project_schedule_date, project_confirmation_date, project_start_datetime, project_end_datetime, agent_ID, service_ID) VALUES
(1, 'false', '2020-02-10 11:45:00', '2020-02-11 11:45:00', '2020-02-12 11:45:00', '2020-02-13 11:45:00', 1, 1);
>>>>>>> e1bf07a3dc8b392624818bf2fc51f97a535f45eb:website/db/TEST_DATABASE_1.sql
