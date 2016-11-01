DROP TABLE IF EXISTS user;
CREATE TABLE user (
	id char(16) PRIMARY KEY,
	name char(255) NOT NULL,
	password char(20) NOT NULL
);

INSERT INTO user VALUES ('test@qq.com','doge','123456');
INSERT INTO user VALUES ('test@163.com','doge1','123456');
INSERT INTO user VALUES ('test@gmail.com','doge2','123456');
INSERT INTO user VALUES ('test@139.com','咸鱼','123456');