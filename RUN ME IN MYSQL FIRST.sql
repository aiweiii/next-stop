drop database if exists wad2_proj;
create database wad2_proj;
use wad2_proj;

create table user_info
(email varchar(250) not null primary key,
fullname varchar(250) not null,
password_hash varchar(250) not null,
university varchar(250) not null);

insert into user_info values
('xueer.teh@smu.edu.sg', 'Teh Xue Er', '', 'University of Vienna'),
('belle.kwang@smu.edu.sg', 'Belle', '', 'Goethe-University Frankfurt am Main'),
('gerald@smu.edu.sg', 'Gerald', '', 'Norwegian School of Economics'),
('aiwei@smu.edu.sg', 'Ai Wei', '', 'Jonkoping International Business School'),
('yuxuan@smu.edu.sg', 'Yu Xuan', '', 'Maastricht University (UCM)');

create table post (
    id integer auto_increment primary key,
    create_timestamp datetime,
    update_timestamp datetime,
    subject varchar(250),
    entry text,
    country varchar(30),
    university varchar(30),
    username varchar(30)
);
--  hardcode images --> some online image

insert into post values 
    ('2021-01-23 22:00:00', '2019-01-23 22:00:00', "My term at CAU", "CAU was wonderful! I enjoyed it so much :-)", 'S. Korea', 'Chung Ang University', 'adam.2018'),
    ('2021-01-25 23:59:02', '2019-01-25 23:59:02', "I love CUL", "Everything about London was amazing - the food, people, weather.", 'UK', 'City University London', 'billy.2018'),
    ('2021-01-29 09:15:00', '2019-01-29 09:15:00', "Please bring me back!", "UOM was such an amazing experience - wait for me I'll be back!", 'UK', 'University of Manchester', 'caleb.2018'),
    ('2021-02-05 21:00:00', '2019-02-05 21:00:00', "I miss you, SNU", "Just like the subject suggests, I miss SNU. uwu", 'S. Korea', 'Seoul National University', 'dorathy.2018'),
    ('2019-02-14 13:12:00', '2019-02-14 13:25:00', "Local exchange was better than expected!", "The culture at NUS is really different from SMU... i guess", 'Taiwan', 'National Sun Yat-Sen University', 'ellise.2018');

-- insert into post (create_timestamp, update_timestamp, subject, entry, country) values 
--     ('2021-01-25 23:59:02', '2019-01-25 23:59:02', "I love UOL", "Everything about London was amazing - the food, people, weather.", 'United Kingdom', 'UOL');
-- insert into post (create_timestamp, update_timestamp, subject, entry, country) values 
--     ('2021-01-29 09:15:00', '2019-01-29 09:15:00', "Please bring me back!", "UOM was such an amazing experience - wait for me I'll be back!", 'United Kingdom', 'UOM');
-- insert into post (create_timestamp, update_timestamp, subject, entry, country) values 
--     ('2021-02-05 21:00:00', '2019-02-05 21:00:00', "I miss you, YSU", "Just like the subject suggests, I miss YSU. uwu", 'Korea', 'YSU');
-- insert into post (create_timestamp, update_timestamp, subject, entry, country) values 
--     ('2019-02-14 13:12:00', '2019-02-14 13:25:00', "Local exchange was better than expected!", "The culture at NUS is really different from SMU... i guess", 'Singapore', 'NUS');