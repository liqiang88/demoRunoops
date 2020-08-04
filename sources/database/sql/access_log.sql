-- 创建表access_log
CREATE TABLE `access_log` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT '0' COMMENT '网站id',
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '访问次数',
  `date` date NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- 添加表数据access_log
INSERT INTO `access_log` VALUES (1, 1, 45, '2020-5-10');
INSERT INTO `access_log` VALUES (2, 3, 100, '2020-5-13');
INSERT INTO `access_log` VALUES (3, 1, 230, '2020-5-14');
INSERT INTO `access_log` VALUES (4, 2, 10, '2020-5-14');
INSERT INTO `access_log` VALUES (5, 5, 205, '2020-5-14');
INSERT INTO `access_log` VALUES (6, 4, 13, '2020-5-15');
INSERT INTO `access_log` VALUES (7, 3, 220, '2020-5-15');
INSERT INTO `access_log` VALUES (8, 5, 545, '2020-5-16');
INSERT INTO `access_log` VALUES (9, 3, 201, '2020-5-17');
