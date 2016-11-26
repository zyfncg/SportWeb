DROP TABLE IF EXISTS users;
CREATE TABLE users (
	userid char(64) PRIMARY KEY,
	name char(255) NOT NULL,
	password char(20) NOT NULL,
	grade int,
	birthday char(10),
	gender char(4),
	address char(100),
	introducec char(256)
);

INSERT INTO user(userid,name,password) VALUES ('test@qq.com','doge','123456');
INSERT INTO user(userid,name,password) VALUES ('test@163.com','doge1','123456');
INSERT INTO user(userid,name,password) VALUES ('test@gmail.com','doge2','123456');
INSERT INTO user(userid,name,password) VALUES ('test@139.com','咸鱼','123456');

DROP TABLE IF EXISTS sport;
CREATE TABLE sport(
	userid char(64) PRIMARY KEY,
	daydate char(10) PRIMARY KEY,
	distance double DEFAULT 0,
	sportTime int DEFAULT 0,
);

INSERT INTO sport();
DROP TABLE IF EXISTS contant;
CREATE TABLE contant(
	hostid char(64) PRIMARY KEY,
	friendid char(64) PRIMARY KEY,

);

DROP TABLE IF EXISTS activty;
CREATE TABLE activty(
	activityid char(72) PRIMARY KEY,
	creator char(64) NOT NULL,
	name char(64) NOT NULL,
	startTime char(18) NOT NULL,
	endTime char(18) NOT NULL,
	peopleNum int DEFAULT 1,
);

DROP TABLE IF EXISTS member;
CREATE TABLE member(
	activityid char(72) PRIMARY KEY,
	memberid char(64) PRIMARY KEY,
);

CREATE VIEW contactView AS 
SELECT userid,friendid,name,grade FROM users,contact
WHERE userid=hostid;

CREATE VIEW memberView AS 
SELECT activityid,memberid,name,grade FROM users,member
WHERE userid=memberid;
