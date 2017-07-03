ALTER TABLE rso ADD COLUMN name VARCHAR(15) AFTER rso_id;

INSERT INTO rso (name, email, admin) VALUES ("KnightsMMA","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("Hack@UCF","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("TechKnights","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("VideoGameKnights","dhellkamp@knights.ucf.edu", 1);

INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ("Presentation on SQLi", "workshop", "Attacking Databases muhuhaha", "16:00:00", "2017-07-15", "University of Central Florida", 1, 0, 3, "4071234567", "dhellkamp@knights.ucf.edu");