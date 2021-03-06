DROP TABLE IF EXISTS users;
CREATE TABLE users (
	userid char(64) PRIMARY KEY,
	username char(255) NOT NULL,
	password char(20) NOT NULL,
	picURL char(255) DEFAULT "../img/defaultuser.png",
	grade int DEFAULT 0,
	birthday char(10),
	gender char(8),
	address char(100),
	intro char(256)
);


DROP TABLE IF EXISTS sport;
CREATE TABLE sport(
	userid char(64),
	daydate char(10),
	distance real DEFAULT 0,
	sportTime int DEFAULT 0,
	PRIMARY KEY(userid,daydate)
);

INSERT INTO sport VALUES('13812341234','2016-11-28',1.5,20);
INSERT INTO sport VALUES('13812341234','2016-11-29',2.5,100);
INSERT INTO sport VALUES('13812341234','2016-11-30',4.5,120);
INSERT INTO sport VALUES('13812341234','2016-11-31',2.5,130);
INSERT INTO sport VALUES('13812341234','2016-12-01',2.5,30);
INSERT INTO sport VALUES('13812341234','2016-12-03',5.2,50);
INSERT INTO sport VALUES('13812341234','2016-12-04',6.5,110);
INSERT INTO sport VALUES('13812341234','2016-11-27',4.5,66);
INSERT INTO sport VALUES('13812341234','2016-11-26',2.2,22);
INSERT INTO sport VALUES('13812341234','2016-11-25',3.4,45);
INSERT INTO sport VALUES('13111111111','2016-11-26',3.5,50);
INSERT INTO sport VALUES('13111111111','2016-11-28',2.5,48);
INSERT INTO sport VALUES('13111111111','2016-11-29',8.7,60);
INSERT INTO sport VALUES('13111111112','2016-11-26',7.5,79);
INSERT INTO sport VALUES('13311111111','2016-11-30',5.5,82);
INSERT INTO sport VALUES('13311111112','2016-11-30',9.5,82);
INSERT INTO sport VALUES('13311111112','2016-12-01',5.5,83);


DROP TABLE IF EXISTS contact;
CREATE TABLE contact(
	hostid char(64),
	friendid char(64),
	PRIMARY KEY(hostid,friendid)
);





DROP TABLE IF EXISTS activity;
CREATE TABLE activity(
	activityid char(72) PRIMARY KEY,
	creator char(64) NOT NULL,
	name char(64) NOT NULL,
	address char(64) NOT NULL,
	startTime char(18) NOT NULL,
	endTime char(18) NOT NULL,
	peopleNum int DEFAULT 1,
	intro TEXT
);


DROP TABLE IF EXISTS member;
CREATE TABLE member(
	activityid char(72),
	memberid char(64),
	PRIMARY KEY(activityid,memberid)
);


DROP VIEW IF EXISTS contactView;
CREATE VIEW contactView AS 
SELECT userid,friendid,username,grade,picURL FROM users,contact
WHERE userid=hostid;

DROP VIEW  IF EXISTS memberView;
CREATE VIEW memberView AS 
SELECT activityid,memberid,picURL,username,grade FROM users,member
WHERE userid=memberid;


INSERT INTO users(userid,username,password) VALUES ('13812341234','doge','123456');
INSERT INTO users(userid,username,password) VALUES ('13311111111','咸鱼','123456');
INSERT INTO users(userid,username,password) VALUES ('13311111112','咸鱼1','123456');
INSERT INTO users(userid,username,password) VALUES ('13311111113','咸鱼2','123456');
INSERT INTO users(userid,username,password) VALUES ('13311111114','咸鱼3','123456');
INSERT INTO users(userid,username,password) VALUES ('13311111115','咸鱼4','123456');
INSERT INTO users(userid,username,password) VALUES ('13311111116','咸鱼5','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111111','doge0','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111112','doge1','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111113','doge2','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111114','doge3','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111115','doge4','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111116','doge5','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111117','doge6','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111118','doge7','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111119','doge8','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111120','doge9','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111121','doge10','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111122','doge11','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111123','doge12','123456');
INSERT INTO users(userid,username,password) VALUES ('13111111124','doge13','123456');

INSERT INTO contact(hostid,friendid) VALUES('13812341234','13111111111');
INSERT INTO contact(hostid,friendid) VALUES('13812341234','13111111112');
INSERT INTO contact(hostid,friendid) VALUES('13812341234','13311111111');
INSERT INTO contact(hostid,friendid) VALUES('13812341234','13311111112');
INSERT INTO contact(hostid,friendid) VALUES('13812341234','13111111115');
INSERT INTO contact(hostid,friendid) VALUES('13311111111','13812341234');
INSERT INTO contact(hostid,friendid) VALUES('13111111111','13812341234');
INSERT INTO contact(hostid,friendid) VALUES('13111111111','13111111112');
INSERT INTO contact(hostid,friendid) VALUES('13111111111','13311111114');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111111');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13311111111');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111113');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111114');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111115');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111116');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111117');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111118');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111119');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111120');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111121');
INSERT INTO contact(hostid,friendid) VALUES('13111111112','13111111122');

INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1381234123420161126','13812341234','马拉松','南京','2016-12-01 13:00','2016-12-01 15:00',5);
INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1381234123420161127','13812341234','马拉松1','南京','2016-12-01 13:00','2016-12-01 15:00',1);
INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1381234123420161128','13812341234','马拉松2','南京','2016-12-01 13:00','2016-12-01 15:00',1);
INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1381234123420161129','13812341234','马拉松3','南京','2016-12-01 13:00','2016-12-01 15:00',1);
INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1311111111120161129','13111111111','环玄武湖骑行','南京','2016-12-01 13:00','2016-12-01 15:00',6);
INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1311111111120161130','13111111111','划船','南京','2016-12-01 13:20','2016-12-01 15:00',2);
INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1311111111120161201','13111111111','划呀划','南京','2016-12-01 13:00','2016-12-01 16:10',2);
INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1331111111220161129','13311111111','划不动了','南京','2016-12-01 13:00','2016-12-01 15:00',1);
INSERT INTO activity(activityid,creator,name,address,startTime,endTime,peopleNum) VALUES('1331111111320161129','13311111111','再划一划','南京','2016-12-01 13:00','2016-12-01 15:00',6);

INSERT INTO member VALUES('1381234123420161126','13111111111');
INSERT INTO member VALUES('1381234123420161126','13111111112');
INSERT INTO member VALUES('1381234123420161126','13111111113');
INSERT INTO member VALUES('1381234123420161126','13111111115');
INSERT INTO member VALUES('1311111111120161129','13311111112');
INSERT INTO member VALUES('1311111111120161129','13812341234');
INSERT INTO member VALUES('1311111111120161129','13111111115');
INSERT INTO member VALUES('1311111111120161129','13111111119');
INSERT INTO member VALUES('1311111111120161129','13111111120');
INSERT INTO member VALUES('1311111111120161130','13311111112');
INSERT INTO member VALUES('1311111111120161201','13311111113');
INSERT INTO member VALUES('1331111111320161129','13111111112');
INSERT INTO member VALUES('1331111111320161129','13111111113');
INSERT INTO member VALUES('1331111111320161129','13111111115');
INSERT INTO member VALUES('1331111111320161129','13111111116');
INSERT INTO member VALUES('1331111111320161129','13812341234');
