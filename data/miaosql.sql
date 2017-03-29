CREATE DATABASE `ofc`;
USE `ofc`;


DROP TABLE IF EXISTS `ofc_admin`;
CREATE TABLE `ofc_admin`(
  `id` int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
);
insert into ofc_admin(username,password) values('admin','21232f297a57a5a743894a0e4a801fc3');
DROP TABLE IF EXISTS `ofc_nav`;
CREATE TABLE `ofc_nav`(
  `id` int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `nId` int(16),
  `ename` varchar(16) NOT NULL
);
insert into ofc_nav (name,nId,ename) values('首页','1','index');
insert into ofc_nav (name,nId,ename) values('新闻公告','2','news');
insert into ofc_nav (name,nId,ename) values('研究队伍','3','faculty');
insert into ofc_nav (name,nId,ename) values('科学研究','4','research');
insert into ofc_nav (name,nId,ename) values('学术成果','5','achievement');
insert into ofc_nav (name,nId,ename) values('学术交流','6','exchange');
insert into ofc_nav (name,nId,ename) values('硕博招生','7','recruit');
insert into ofc_nav (name,nId,ename) values('联系我们','8','contact');

DROP TABLE IF EXISTS `ofc_list`;
CREATE TABLE `ofc_list`(
   `id` int(16) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `lName` varchar(32) NOT NULL,
   `nId` int(16),
   `list` int(10) not null
);
insert into ofc_list(lName,nId,list) values('综合新闻','2','21');
insert into ofc_list(lName,nId,list) values('信息公告','2','22');
insert into ofc_list(lName,nId,list) values('学生活动','2','23');
insert into ofc_list(lName,nId,list) values('研究组简介','3','31');
insert into ofc_list(lName,nId,list) values('研究人员','3','32');
insert into ofc_list(lName,nId,list) values('科学研究','4','41');
insert into ofc_list(lName,nId,list) values('论文专著','5','51');
insert into ofc_list(lName,nId,list) values('专利成果','5','52');
insert into ofc_list(lName,nId,list) values('学术交流','6','61');
insert into ofc_list(lName,nId,list) values('科普园地','6','62');
insert into ofc_list(lName,nId,list) values('硕博招生','7','71');
insert into ofc_list(lName,nId,list) values('科普园地','8','81');


DROP TABLE IF EXISTS `ofc_mes`;
CREATE TABLE `ofc_mes`(
    `id` int(16) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(200) NOT NULL,
    `content` varchar(4000) NOT NULL,
    `numbers` int(10) unsigned NOT NULL DEFAULT 0,
    `pubTime` int(10) unsigned  NOT NULL,
    `pubBer` varchar(32) NOT NULL,
    `nId` int(10) unsigned,
    `list` int(16) unsigned NOT NULL,
    UNIQUE KEY `id` (`id`)
);


CREATE TABLE `ofc_note`(
   `id` int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `title` varchar(200) NOT NULL,
   `content` varchar(2000) NOT NULL,
   `pubTime` int(10) unsigned NOT NULL,
   `isTrue` enum('1','0') NOT NULL DEFAULT '1'
)
DROP TABLE IF EXISTS `ofc_album`;
CREATE TABLE `ofc_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `mId` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL
);









--
--DROP TABLE IF EXISTS `miao_user`;
--
--CREATE TABLE `miao_user` (
--  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--  `username` varchar(20) NOT NULL,
--  `password` char(32) NOT NULL,
--  `sex` enum('��','Ů','����') NOT NULL DEFAULT '����',
--  `email` varchar(50) NOT NULL,
--  `face` varchar(50) NOT NULL,
--  `regTime` int(10) unsigned NOT NULL,
--  `activeFlag` tinyint(1) DEFAULT '0',
--  `selfinfo` char(50),
--  PRIMARY KEY (`id`),
--  UNIQUE KEY `username` (`username`)
--)
--DROP TABLE IF EXISTS `miao_album`;
--CREATE TABLE `miao_album` (
--  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--  `Uid` int(10) unsigned NOT NULL,
--  `albumPath` varchar(50) NOT NULL,
--  PRIMARY KEY (`id`)
--)
--CREATE TABLE `miao_mes` (
--  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--  `Uid` int(10) unsigned NOT NULL,
--  `Ucontent` varchar(200) NOT NULL,
--  `Utime` varchar(20) NOT NULL,
--  PRIMARY KEY (`id`)
--)
--
--DROP TABLE IF EXISTS `miao_admin`;
--CREATE TABLE `miao_admin` (
--  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
--  `username` varchar(20) NOT NULL,
--  `password` char(32) NOT NULL,
--  `email` varchar(50) NOT NULL,
--  PRIMARY KEY (`id`),
--  UNIQUE KEY `username` (`username`)
--)