-- create databases
CREATE DATABASE IF NOT EXISTS `hills_dev`;
CREATE DATABASE IF NOT EXISTS `hills_test`;

-- create user and grant rights
CREATE USER 'hills_usr'@'%' IDENTIFIED BY 'hills_pw';
GRANT ALL ON *.* TO 'hills_usr'@'%';
