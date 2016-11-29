DROP TABLE IF EXISTS users;
CREATE TABLE users (
	userid char(64) PRIMARY KEY,
	username char(255) NOT NULL,
	password char(20) NOT NULL,
	picURL char(255) DEFAULT "../img/defaultuser.png",
	grade int DEFAULT 0,
	birthday char(10),
	gender char(4),
	address char(100),
	introducec char(256)
);

INSERT INTO users(userid,username,password) VALUES ('13812341234','doge','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111111','doge1','123456');
INSERT INTO users(userid,username,password) VALUES ('13211111112','doge2','123456');
INSERT INTO users(userid,username,password) VALUES ('13311111112','咸鱼','123456');
INSERT INTO users(userid,username,password) VALUES ('13411111112','咸鱼1','123456');
INSERT INTO users(userid,username,password) VALUES ('13511111112','咸鱼2','123456');
INSERT INTO users(userid,username,password) VALUES ('13611111112','咸鱼3','123456');
INSERT INTO users(userid,username,password) VALUES ('13711111112','咸鱼4','123456');
INSERT INTO users(userid,username,password) VALUES ('13811111112','咸鱼5','123456');

DROP TABLE IF EXISTS sport;
CREATE TABLE sport(
	userid char(64),
	daydate char(10),
	distance real DEFAULT 0,
	sportTime int DEFAULT 0,
	PRIMARY KEY(userid,daydate)
);

INSERT INTO sport VALUES('13812341234','2016-11-18',1.5,20);
INSERT INTO sport VALUES('13812341234','2016-11-19',2.5,100);
INSERT INTO sport VALUES('13812341234','2016-11-20',4.5,120);
INSERT INTO sport VALUES('13812341234','2016-11-21',2.5,130);
INSERT INTO sport VALUES('13812341234','2016-11-22',5.5,50);
INSERT INTO sport VALUES('13812341234','2016-11-23',4.5,36);
INSERT INTO sport VALUES('13812341234','2016-11-24',2.2,22);
INSERT INTO sport VALUES('13812341234','2016-11-25',3.4,45);
INSERT INTO sport VALUES('13812341234','2016-11-26',3.5,50);
INSERT INTO sport VALUES('13812341234','2016-11-28',2.5,48);
INSERT INTO sport VALUES('13111111111','2016-11-27',5.5,60);
INSERT INTO sport VALUES('13211111112','2016-11-26',5.5,79);
INSERT INTO sport VALUES('13311111112','2016-11-26',5.5,82);


DROP TABLE IF EXISTS contact;
CREATE TABLE contact(
	hostid char(64),
	friendid char(64),
	PRIMARY KEY(hostid,friendid)
);
INSERT INTO contact(hostid,friendid) VALUES('test@qq.com','test@163.com');
INSERT INTO contact(hostid,friendid) VALUES('test@qq.com','test1@qq.com');
INSERT INTO contact(hostid,friendid) VALUES('test@qq.com','test3@qq.com');
INSERT INTO contact(hostid,friendid) VALUES('test@qq.com','test@gmail.com');
INSERT INTO contact(hostid,friendid) VALUES('test1@qq.com','test@qq.com');
INSERT INTO contact(hostid,friendid) VALUES('test1@qq.com','test2@qq.com');
INSERT INTO contact(hostid,friendid) VALUES('test1@qq.com','test3@qq.com');
INSERT INTO contact(hostid,friendid) VALUES('test2@qq.com','test@qq.com');
INSERT INTO contact(hostid,friendid) VALUES('test2@qq.com','test1@qq.com');

INSERT INTO contact(hostid,friendid) VALUES('test@163.com','test@qq.com');

DROP TABLE IF EXISTS activity;
CREATE TABLE activity(
	activityid char(72) PRIMARY KEY,
	creator char(64) NOT NULL,
	name char(64) NOT NULL,
	startTime char(18) NOT NULL,
	endTime char(18) NOT NULL,
	peopleNum int DEFAULT 1
);
INSERT INTO activity VALUES('test@qq.com2016-11-26','test@qq.com','马拉松','2016-12-01 13:00','2016-12-01 15:00',2);

DROP TABLE IF EXISTS member;
CREATE TABLE member(
	activityid char(72),
	memberid char(64),
	PRIMARY KEY(activityid,memberid)
);
INSERT INTO member VALUES('test@qq.com2016-11-26','test@163.com');

DROP VIEW IF EXISTS contactView;
CREATE VIEW contactView AS 
SELECT userid,friendid,username,grade,picURL FROM users,contact
WHERE userid=hostid;

DROP VIEW  IF EXISTS memberView;
CREATE VIEW memberView AS 
SELECT activityid,memberid,name,grade FROM users,member
WHERE userid=memberid;
