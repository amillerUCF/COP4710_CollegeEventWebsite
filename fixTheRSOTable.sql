ALTER TABLE rso ADD COLUMN name VARCHAR(15) AFTER rso_id;

INSERT INTO rso (name, email, admin) VALUES ("KnightsMMA","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("Hack@UCF","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("TechKnights","dhellkamp@knights.ucf.edu", 1);
INSERT INTO rso (name, email, admin) VALUES ("VideoGameKnights","dhellkamp@knights.ucf.edu", 1);