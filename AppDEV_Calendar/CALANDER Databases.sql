CREATE TABLE USERS(
USERNAME VARCHAR(30) NOT NULL,
PASSWORD VARCHAR(100),NOT NULL,
CONSTRAINT USERS_PRIMARY_KEY PRIMARY KEY(USERNAME));

CREATE TABLE EVENTS(
ID NUMERIC Not null A
EVENTNAME VARCHAR(100),
USERNAME VARCHAR(30),
STARTS DATETIME,
ENDS DATETIME,
LOCATION VARCHAR(100),
DESCRIPTION VARCHAR(500),
CONSTRAINT EVENT_FOREIGN_KEY FOREIGN KEY(USERNAME) REFERENCES USERS(USERNAME),
CONSTRAINT EVENT_PRIMARY_KEY PRIMARY KEY(DATES,EVENTNAME));

SELECT * FROM EVENTS WHERE USERNAME=$USERNAME AND DATES=$DATES;
//DISPLAY EVENT 