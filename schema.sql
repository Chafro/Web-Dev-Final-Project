DROP DATABASE IF EXISTS User_DB;
CREATE DATABASE User_DB;
USE User_DB;

DROP TABLE IF EXISTS `users`;
CREATE TABLE users (
`id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
`uidUsers` TINYTEXT NOT NULL,
`emailUsers` TINYTEXT NOT NULL,
`pwdUsers` LONGTEXT NOT NULL,
`firstname` TINYTEXT NOT NULL,
`lastname` TINYTEXT NOT NULL,
`date_joined` DATE NOT NULL 
);

DROP TABLE IF EXISTS `Issues`;
CREATE TABLE `Issues` (
	`id`int(11) NOT NULL auto_increment,
	`title` char(65) NOT NULL ,
	`description` char(250) NOT NULL ,
	`type` char(35) NOT NULL  ,
	`priority` char(12) NOT NULL  ,
	`date_joined` DATE NOT NULL ,
	`assigned_to` char(35) NOT NULL ,
	`created_by` char(12) NOT NULL  ,
	`created` DATE NOT NULL  ,
	`updated` char(12) NOT NULL  ,
	PRIMARY KEY  (`id`)
	);
