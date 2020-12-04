create database forumDB;

use forumDB;


create table users (userid INT auto_increment primary key, email VARCHAR(30), username VARCHAR(20), password VARCHAR(20));

create table comments (commentid INT auto_increment primary key, posterid INT, chatid INT, content VARCHAR(200), FOREIGN KEY (posterid) REFERENCES users(userid));

create table chats (chatid INT auto_increment primary key, creatorid INT, topicid INT, name VARCHAR(20), FOREIGN KEY (creatorid) REFERENCES users(userid));

create table topics (topicid INT auto_increment primary key, name VARCHAR(20));

create table moderators (userid INT, topicid INT, PRIMARY KEY (userid, topicid), permissions INT);



INSERT INTO topics (name) VALUES ("Games Related");

INSERT INTO topics (name) VALUES ("Product Related");



INSERT INTO users (email, username, password) VALUES ("bot@bot.bot", "Bot", "password");


iNSERT INTO chats (creatorid, topicid, name) VALUES (1, 1, "Bot testing, Welcome Gamers!");