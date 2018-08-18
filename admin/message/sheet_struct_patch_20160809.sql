INSERT INTO `db_menu` VALUES ('1470703473', '0', '消息公告', '#', '46', '1', 'message', '0');
INSERT INTO `db_menu` VALUES ('1470703770', '1470703473', '课程排班', 'message/curriculum_schedule.php', '1', '1', 'curriculumSchedule', '1');

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : drs

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2016-08-09 11:09:51
*/


-- ----------------------------
-- Table structure for sheet_data
-- ----------------------------
DROP TABLE IF EXISTS `sheet_data`;
CREATE TABLE `sheet_data` (
  `sheetid` varchar(255) NOT NULL DEFAULT '',
  `columnid` int(11) NOT NULL DEFAULT '0',
  `rowid` int(11) NOT NULL DEFAULT '0',
  `data` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `parsed` varchar(255) DEFAULT NULL,
  `calc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sheetid`,`columnid`,`rowid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sheet_data
-- ----------------------------

-- ----------------------------
-- Table structure for sheet_header
-- ----------------------------
DROP TABLE IF EXISTS `sheet_header`;
CREATE TABLE `sheet_header` (
  `sheetid` varchar(255) NOT NULL DEFAULT '',
  `columnid` int(11) NOT NULL DEFAULT '0',
  `label` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  PRIMARY KEY (`sheetid`,`columnid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sheet_header
-- ----------------------------

-- ----------------------------
-- Table structure for sheet_sheet
-- ----------------------------
DROP TABLE IF EXISTS `sheet_sheet`;
CREATE TABLE `sheet_sheet` (
  `sheetid` varchar(255) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `cfg` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`sheetid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sheet_sheet
-- ----------------------------
INSERT INTO `sheet_sheet` VALUES ('5', null, null, null, null);

-- ----------------------------
-- Table structure for sheet_triggers
-- ----------------------------
DROP TABLE IF EXISTS `sheet_triggers`;
CREATE TABLE `sheet_triggers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sheetid` varchar(255) DEFAULT NULL,
  `trigger` varchar(10) DEFAULT NULL,
  `source` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sheet_triggers
-- ----------------------------

-- ----------------------------
-- Table structure for sheet_user
-- ----------------------------
DROP TABLE IF EXISTS `sheet_user`;
CREATE TABLE `sheet_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `apikey` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `secret` varchar(64) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sheet_user
-- ----------------------------
