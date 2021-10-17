#creating DB and selecting it
CREATE DATABASE IF NOT EXISTS uni_exchange;
USE uni_exchange;

#create tables
create table user_info
(email varchar(255) not null primary key,
fullname varchar(255) not null,
password varchar(255) not null);

#check if correct
-- select * from user_info;