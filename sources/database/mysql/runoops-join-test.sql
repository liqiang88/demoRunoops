/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50726
Source Host           : 127.0.0.1:3306
Source Database       : runoops

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-06-06 20:36:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for apps
-- ----------------------------
DROP TABLE IF EXISTS `apps`;
CREATE TABLE `apps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_name` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `url` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `country` varchar(20) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of apps
-- ----------------------------
INSERT INTO `apps` VALUES ('1', '微信 APP', 'http://im.qq.com/', 'CN');
INSERT INTO `apps` VALUES ('2', '淘宝 APP', 'https://www.taobao.com/', 'CN');

-- ----------------------------
-- Table structure for employee_tbl
-- ----------------------------
DROP TABLE IF EXISTS `employee_tbl`;
CREATE TABLE `employee_tbl` (
  `id` int(11) NOT NULL,
  `name` char(10) NOT NULL DEFAULT '',
  `date` datetime NOT NULL,
  `singin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee_tbl
-- ----------------------------
INSERT INTO `employee_tbl` VALUES ('1', '小明', '2020-04-22 15:25:33', '1');
INSERT INTO `employee_tbl` VALUES ('2', '小王', '2020-04-20 15:25:47', '3');
INSERT INTO `employee_tbl` VALUES ('3', '小丽', '2020-04-19 15:26:02', '2');
INSERT INTO `employee_tbl` VALUES ('4', '小王', '2020-04-07 15:26:14', '4');
INSERT INTO `employee_tbl` VALUES ('5', '小明', '2020-04-11 15:26:40', '4');
INSERT INTO `employee_tbl` VALUES ('6', '小明', '2020-04-04 15:26:54', '2');

-- ----------------------------
-- Table structure for runoops_tbl
-- ----------------------------
DROP TABLE IF EXISTS `runoops_tbl`;
CREATE TABLE `runoops_tbl` (
  `runoops_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `runoops_title` varchar(100) NOT NULL,
  `runoops_author` varchar(40) NOT NULL,
  `added_date` datetime DEFAULT NULL,
  PRIMARY KEY (`runoops_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of runoops_tbl
-- ----------------------------
INSERT INTO `runoops_tbl` VALUES ('1', '学习 PHP', 'runoops自学教程', '2020-06-06 10:58:07');
INSERT INTO `runoops_tbl` VALUES ('2', '学习 MySQL', 'runoops自学教程', '2020-06-06 10:58:36');
INSERT INTO `runoops_tbl` VALUES ('4', '学习 MySQL', 'runoops.com', '2020-06-06 00:00:00');
INSERT INTO `runoops_tbl` VALUES ('5', '学习 HTML', 'runoops.com', '2020-06-06 20:00:00');

-- ----------------------------
-- Table structure for tcount_tbl
-- ----------------------------
DROP TABLE IF EXISTS `tcount_tbl`;
CREATE TABLE `tcount_tbl` (
  `runoops_author` varchar(255) NOT NULL DEFAULT '',
  `runoops_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tcount_tbl
-- ----------------------------
INSERT INTO `tcount_tbl` VALUES ('自学教程', '10');
INSERT INTO `tcount_tbl` VALUES ('runoops.com', '20');
INSERT INTO `tcount_tbl` VALUES ('Google', '22');

-- ----------------------------
-- Table structure for websites
-- ----------------------------
DROP TABLE IF EXISTS `websites`;
CREATE TABLE `websites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `url` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `alexa` int(10) unsigned NOT NULL DEFAULT '0',
  `country` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of websites
-- ----------------------------
INSERT INTO `websites` VALUES ('1', 'Goole', 'https://www.google.cm/', '1', 'USA');
INSERT INTO `websites` VALUES ('2', 'Amazon', 'https://z.cn/', '2', 'USA');
INSERT INTO `websites` VALUES ('3', '淘宝', 'https://www.taobao.com/', '10', 'CN');
INSERT INTO `websites` VALUES ('4', '自学教程', 'http://runoops.com/', '5787', 'CN');
INSERT INTO `websites` VALUES ('5', '微博', 'http://weibo.com/', '18', 'CN');
INSERT INTO `websites` VALUES ('6', 'stackoverflow ', 'http://stackoverflow.com/', '66', 'IND');