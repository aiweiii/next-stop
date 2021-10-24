drop database if exists is216proj_trial;

create database is216proj_trial;
use is216proj_trial;

-- drop table forumPerson;

CREATE TABLE IF NOT EXISTS forumPerson (
--     id          INT NOT NULL AUTO_INCREMENT,
    name        VARCHAR(128),
    email       VARCHAR(128),
    uni         VARCHAR(128),
    country     VARCHAR(128),
    fdesc       VARCHAR(255),
    PRIMARY KEY(email)
);

INSERT INTO forumPerson (name, email, country, uni, fdesc) VALUES ('person1', 'p1@smu.edu.sg', 'SG', 'NUS', 'hi hello 1, I went to NUS');
INSERT INTO forumPerson (name, email, country, uni, fdesc) VALUES ('person2', 'p2@smu.edu.sg', 'SG', 'NTU', 'hi hello 2, I went to NTU');
INSERT INTO forumPerson (name, email, country, uni, fdesc) VALUES ('person3', 'p3@smu.edu.sg', 'KR', 'SNU', 'hi hello 3, I went to SNU');
INSERT INTO forumPerson (name, email, country, uni, fdesc) VALUES ('person4', 'p4@smu.edu.sg', 'KR', 'YSU', 'hi hello 4, I went to YSU');
INSERT INTO forumPerson (name, email, country, uni, fdesc) VALUES ('person5', 'p5@smu.edu.sg', 'UK', 'UOM', 'hi hello 5, I went to UOM');
INSERT INTO forumPerson (name, email, country, uni, fdesc) VALUES ('person6', 'p6@smu.edu.sg', 'UK', 'UOL', 'hi hello 6, I went to UOL');

-- select * from forumPerson where country like "NTU";

-- profilepic, name, country, city, university (can be null), title, 
-- timestamp, description, isupvoted, isdownvoted, images (can be null), tags

-- CREATE TABLE IF NOT EXISTS person (
--     id           INT NOT NULL AUTO_INCREMENT,
--     name        VARCHAR(128)  NOT NULL,
--     gender      CHAR(2) NOT NULL,
--     age   		INT NOT NULL,
--     PRIMARY KEY(id)
-- );

-- INSERT INTO person (name, gender, age) VALUES ('Amy', 'F', '28');
-- INSERT INTO person (name, gender, age) VALUES ('Bill', 'M', '18');
-- INSERT INTO person (name, gender, age) VALUES ('Charles', 'M', '17');
-- INSERT INTO person (name, gender, age) VALUES ('Doraemon', 'F', '32');