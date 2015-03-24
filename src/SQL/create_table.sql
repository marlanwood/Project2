USE users; /*Database named users*/

CREATE TABLE IF NOT EXISTS USERS (
ID       int         NOT NULL AUTO_INCREMENT PRIMARY KEY,
USERNAME varchar(50) NOT NULL,
PASSWORD varchar(50) NOT NULL
);

