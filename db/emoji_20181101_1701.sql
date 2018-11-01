/*
Navicat MySQL Data Transfer

Source Server         : emoji
Source Server Version : 50723
Source Host           : 118.89.215.84:3306
Source Database       : emoji

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2018-11-01 17:01:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `emoji_content`
-- ----------------------------
DROP TABLE IF EXISTS `emoji_content`;
CREATE TABLE `emoji_content` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='内容表';

-- ----------------------------
-- Records of emoji_content
-- ----------------------------
INSERT INTO `emoji_content` VALUES ('1', '哈哈 \\ud83d\\ude04');
INSERT INTO `emoji_content` VALUES ('2', '\\ud83d\\udcaa 加油');
INSERT INTO `emoji_content` VALUES ('3', '笑脸 \\ud83d\\ude0a');
