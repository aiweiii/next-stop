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
    subject varchar(500),
    entry text,
    country varchar(30),
    university varchar(30),
    username varchar(30)
);

insert into post (create_timestamp, update_timestamp, subject, entry, country, university, username) values 
    ('2021-01-23 22:00:00', '2019-01-23 22:00:00', 
    "My term at Korea University", 
    "Korea University was wonderful and I enjoyed my exchange so much! Everything about my trip to Korea was amazing - the food, people and best of all, the weather! I went during winter season and I saw snow for the first time! Made snow angels with my new friends from KU too!", 
    'South Korea', 
    'Korea University', 
    'Adam Choong');


