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
	distance real DEFAULT 0,
	sportTime int DEFAULT 0,
);

INSERT INTO sport VALUES('test@qq.com','2016-11-26',5.5,120);
INSERT INTO sport VALUES('test@163.com','2016-11-27',5.5,120);
INSERT INTO sport VALUES('test@163.com','2016-11-26',5.5,120);
INSERT INTO sport VALUES('test@gmail.com','2016-11-26',5.5,120);


DROP TABLE IF EXISTS contant;
CREATE TABLE contant(
	hostid char(64) PRIMARY KEY,
	friendid char(64) PRIMARY KEY,

);
INSERT INTO contant VALUES('test@qq.com','test@163.com');
INSERT INTO contant VALUES('test@163.com','test@qq.com');

DROP TABLE IF EXISTS activty;
CREATE TABLE activty(
	activityid char(72) PRIMARY KEY,
	creator char(64) NOT NULL,
	name char(64) NOT NULL,
	startTime char(18) NOT NULL,
	endTime char(18) NOT NULL,
	peopleNum int DEFAULT 1,
);
INSERT INTO activity VALUES('test@qq.com2016-11-26','test@qq.com','马拉松','2016-12-01 13:00','2016-12-01 15:00',2);

DROP TABLE IF EXISTS member;
CREATE TABLE member(
	activityid char(72) PRIMARY KEY,
	memberid char(64) PRIMARY KEY,
);
INSERT INTO member VALUES('test@qq.com2016-11-26','test@163.com');


CREATE VIEW contactView AS 
SELECT userid,friendid,name,grade FROM users,contact
WHERE userid=hostid;

CREATE VIEW memberView AS 
SELECT activityid,memberid,name,grade FROM users,member
WHERE userid=memberid;
