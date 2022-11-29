DROP TABLE IF EXISTS chat_users;
DROP TABLE IF EXISTS chat;
DROP TABLE IF EXISTS chat_login_details;

CREATE TABLE chat_users (
userid              int(11) NOT NULL,
username            varchar(255) NOT NULL,
password_           varchar(255) NOT NULL,
avatar              varchar(255) NOT NULL,
current_session     int(11) NOT NULL,
online_             int(11) NOT NULL
);

CREATE TABLE chat (
chatid              int(11) NOT NULL,
sender_userid       int(11) NOT NULL,
reciever_userid     int(11) NOT NULL,
message_            text NOT NULL,
timestamp_          timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
status_             int(1) NOT NULL
);

CREATE TABLE chat_login_details (
id              int(11) NOT NULL,
userid          int(11) NOT NULL,
last_activity   timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);