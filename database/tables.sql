DROP TABLE IF EXISTS user;
CREATE TABLE user (
	userid char(64) PRIMARY KEY,
	name char(255) NOT NULL,
	password char(20) NOT NULL,
	grade int,
);

INSERT INTO user VALUES ('test@qq.com','doge','123456');
INSERT INTO user VALUES ('test@163.com','doge1','123456');
INSERT INTO user VALUES ('test@gmail.com','doge2','123456');
INSERT INTO user VALUES ('test@139.com','咸鱼','123456');

DROP TABLE IF EXISTS sport;
CREATE TABLE sport(
	userid char(64) PRIMARY KEY,
	day char(10) PRIMARY KEY,
	distance double DEFAULT 0,
	time int DEFAULT 0,
);


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
CREATE TABLE participate(
	activityid char(72) PRIMARY KEY,
	memberid char(64),
);

