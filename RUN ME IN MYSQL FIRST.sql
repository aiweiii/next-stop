drop database if exists wad2_proj;
create database wad2_proj;
use wad2_proj;

create table user_info
(email varchar(250) not null primary key,
fullname varchar(250) not null,
password_hash varchar(250) not null,
university varchar(250) not null);

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

insert into post (create_timestamp, update_timestamp, subject, entry, country, university, username) values 
    ('2021-01-23 22:00:00', '2019-01-23 22:00:00', "My term at SNU", "SNU was wonderful! I enjoyed it so much :-)", 'Korea', 'SNU', 'adam.2018');
    insert into post (create_timestamp, update_timestamp, subject, entry, country, university, username) values 
    ('2021-01-25 23:59:02', '2019-01-25 23:59:02', "I love UOL", "Everything about London was amazing - the food, people, weather.", 'United Kingdom', 'UOL', 'billy.2018');
    insert into post (create_timestamp, update_timestamp, subject, entry, country, university, username) values 
    ('2021-01-29 09:15:00', '2019-01-29 09:15:00', "Please bring me back!", "UOM was such an amazing experience - wait for me I'll be back!", 'United Kingdom', 'UOM', 'caleb.2018');
    insert into post (create_timestamp, update_timestamp, subject, entry, country, university, username) values 
    ('2021-02-05 21:00:00', '2019-02-05 21:00:00', "I miss you, YSU", "Just like the subject suggests, I miss YSU. uwu", 'Korea', 'YSU', 'dorathy.2018');
    insert into post (create_timestamp, update_timestamp, subject, entry, country, university, username) values 
    ('2019-02-14 13:12:00', '2019-02-14 13:25:00', "Local exchange was better than expected!", "The culture at NUS is really different from SMU... i guess", 'Singapore', 'NUS', 'ellise.2018');


-- insert into post (create_timestamp, update_timestamp, subject, entry, country) values 
--     ('2021-01-25 23:59:02', '2019-01-25 23:59:02', "I love UOL", "Everything about London was amazing - the food, people, weather.", 'United Kingdom', 'UOL');
-- insert into post (create_timestamp, update_timestamp, subject, entry, country) values 
--     ('2021-01-29 09:15:00', '2019-01-29 09:15:00', "Please bring me back!", "UOM was such an amazing experience - wait for me I'll be back!", 'United Kingdom', 'UOM');
-- insert into post (create_timestamp, update_timestamp, subject, entry, country) values 
--     ('2021-02-05 21:00:00', '2019-02-05 21:00:00', "I miss you, YSU", "Just like the subject suggests, I miss YSU. uwu", 'Korea', 'YSU');
-- insert into post (create_timestamp, update_timestamp, subject, entry, country) values 
--     ('2019-02-14 13:12:00', '2019-02-14 13:25:00', "Local exchange was better than expected!", "The culture at NUS is really different from SMU... i guess", 'Singapore', 'NUS');