CREATE DATABASE IF NOT EXISTS ceh;
USE ceh;
CREATE TABLE IF NOT EXISTS catalog (
	id int auto_increment,
	item varchar(50),
	price real,
	quantity int,
	primary key (id)
);
INSERT INTO catalog (item, price, quantity) VALUES ('Hammer', 9.99, 10);

CREATE TABLE IF NOT EXISTS users (
	id int auto_increment,
	username varchar(50),
	password varchar(50),
	name varchar(50),
	primary key (id)
);
INSERT INTO users (username, password, name) VALUES ('jim', 'xxx', 'Jim');
INSERT INTO users (username, password, name) VALUES ('carl', 'pass', 'Carl');
INSERT INTO users (username, password, name) VALUES ('admin', 'irrelevant', 'Admin');

CREATE TABLE IF NOT EXISTS comments (
	id int auto_increment,
	name varchar(50),
	email varchar(50),
	message text,
	primary key(id)
);
CREATE TABLE IF NOT EXISTS secrets (
	id int auto_increment,
	flag varchar(50),
	primary key(id)
);
INSERT INTO secrets (flag) VALUES ('COG{1f8ae7daa173831b5e869b2f28efc864}');
