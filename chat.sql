/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : chat

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-03-06 14:04:16
*/

/**
 * @author HappyUncle <15822775539@163.com>
 * @link http://weibo.com/kathelinhappy
 * @since 0.1 2017年3月6日15:16:52
 * @copyright GPL 
 */

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `chat_log`
-- ----------------------------
DROP TABLE IF EXISTS `chat_log`;
CREATE TABLE `chat_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) DEFAULT NULL,
  `content` varchar(200) NOT NULL,
  `sendtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chat_log
-- ----------------------------
INSERT INTO `chat_log` VALUES ('1', '张三', '123', '1488715242');
INSERT INTO `chat_log` VALUES ('2', '张三', '123', '1488715433');
INSERT INTO `chat_log` VALUES ('3', '张三', '123', '1488715655');
