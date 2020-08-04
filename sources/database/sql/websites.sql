-- 创建表websites
CREATE TABLE `websites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `url` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `alexa` int(10) unsigned NOT NULL DEFAULT '0',
  `country` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- 添加表websites数据
INSERT INTO `websites` VALUES (1, 'Goole', 'https://www.google.cm/', 1, 'USA');
INSERT INTO `websites` VALUES (2, 'Amazon', 'https://z.cn/', 2, 'USA');
INSERT INTO `websites` VALUES (3, '淘宝', 'https://www.taobao.com/', 10, 'CN');
INSERT INTO `websites` VALUES (4, '自学教程', 'http://runoops.com/', 5787, 'USA');
INSERT INTO `websites` VALUES (5, '微博', 'http://weibo.com/', 18, 'CN');
INSERT INTO `websites` VALUES (6, 'stackoverflow ', 'http://stackoverflow.com/', 66, 'IND');
