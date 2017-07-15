drop database if exists cop4710;

#create a new database named cop4710
create database cop4710;

#switch to the new database
use cop4710;

#create the users table
CREATE TABLE users (
	user_id 	INT(11) NOT NULL auto_increment,
	username 	varchar(20) NOT NULL,
	password 	char(40) NOT NULL,
	priv 		int(1) NOT NULL,
	firstname	VARCHAR(30) NOT NULL,
	lastname	VARCHAR(30) NOT NULL,
	email		VARCHAR(50),
	reg_date	TIMESTAMP,
	rso			INT(5),
	univ_id		INT(6),
	PRIMARY KEY (user_id),
	UNIQUE KEY 	username (username)
); 

	
#create the Universities table
CREATE TABLE universities (
	univ_id			INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name			VARCHAR (30),
	location		VARCHAR (30), 
	description		VARCHAR (50),
	num_students	INT(10),
	pictures		LONGBLOB
);

#create the Events table
CREATE TABLE events (
	event_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name			VARCHAR (30),
	category		VARCHAR (30),
	description		VARCHAR (50),
	event_time		VARCHAR (50),
	event_date		VARCHAR (50), 
	location		VARCHAR (100),
	univ_id			INT(6),
	priv			INT(1),
	rso				INT(5),
	contact_phone	INT(10),
	contact_email	VARCHAR (50)
);

#create the Comments table	
CREATE TABLE comments (
	comment_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	event_id		INT(6),
	user_id			INT(6),
	text			VARCHAR(140)
);

#create the Ratings table	
CREATE TABLE ratings (
	rating_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	event_id		INT(6),
	comment_id		INT(5),
	rating			INT(1),
	user_id			INT(6)
);

#create the RSO table
CREATE TABLE rso(
	rso_id			INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email			VARCHAR(20),
	admin			INT(11)
);

ALTER TABLE rso ADD COLUMN name VARCHAR(15) AFTER rso_id;

#create the Follows table
#table is for when a user follows an event.
CREATE TABLE follows (
    user_id         INT(11),
    event_id        INT(6),
    PRIMARY KEY (user_id, event_id)
);

create table In_RSO(
user_id INT,
rso_id INT,
rel_id INT(11) NOT NULL auto_increment,
PRIMARY KEY (rel_id));

INSERT INTO rso (name, email, admin) VALUES ("KnightsMMA","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("Hack@UCF","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("TechKnights","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("VideoGameKnights","dhellkamp@knights.ucf.edu", 1);
INSERT INTO events (event_id, name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES (000001, "Presentation on SQLi", "workshop", "Attacking Databases muhuhaha", "16:00:00", "2017-07-15", "University of Central Florida", 1, 0, 3, "4071234567", "dhellkamp@knights.ucf.edu");
INSERT INTO follows (user_id, event_id) VALUES (Default, 1);
INSERT INTO follows (user_id, event_id) VALUES (Default, 8);
INSERT INTO follows (user_id, event_id) VALUES (123456, 1);
INSERT INTO follows (user_id, event_id) VALUES (123456, 1);
