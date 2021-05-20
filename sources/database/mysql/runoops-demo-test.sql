-- BINARY关键字区分大小写
SELECT * FROM runoops_tbl  WHERE BINARY runoops_author ='runoops.com';
SELECT * FROM runoops_tbl  WHERE BINARY runoops_author ='RUNOOPS.COM';

-- UPDATE语句
UPDATE runoops_tbl SET runoops_title='学习 HTML' WHERE runoops_id=3;

SELECT * FROM runoops_tbl WHERE runoops_id = 3;

-- DELTE 语句
DELETE FROM runoops_tbl WHERE runoops_id=3;

-- LIKE 语句
SELECT * FROM runoops_tbl WHERE runoops_author LIKE '%com';

SELECT * FROM websites;

-- UNION 联合查询
SELECT country FROM websites
UNION
SELECT country FROM apps
ORDER BY country;

-- UNION  联合查询
SELECT country FROM websites
UNION ALL
SELECT country FROM apps
ORDER BY country;

-- UNION  联合查询（有重复值）
SELECT country, name FROM websites
WHERE country='CN'
UNION ALL
SELECT country, app_name FROM apps
WHERE country='CN'
ORDER BY country;

-- ORDER BY 排序
SELECT * FROM runoops_tbl ORDER BY added_date ASC;

-- 统计
SELECT name, COUNT(*) AS cnt FROM   employee_tbl GROUP BY name;

-- 统计再统计
SELECT name, SUM(singin) as singin_count FROM  employee_tbl GROUP BY name WITH ROLLUP;

SELECT name, SUM(singin) as singin_count FROM  employee_tbl GROUP BY name;

-- coalesce语法
SELECT coalesce(name, '总数'), SUM(singin) as singin_count FROM  employee_tbl GROUP BY name WITH ROLLUP;

-- INNER JOIN
SELECT a.runoops_id, a.runoops_author, b.runoops_count FROM runoops_tbl a INNER JOIN tcount_tbl b ON a.runoops_author = b.runoops_author;

-- 等同于INNER JOIN
SELECT a.runoops_id, a.runoops_author, b.runoops_count FROM runoops_tbl a,tcount_tbl b WHERE a.runoops_author = b.runoops_author;

-- LEFT JOIN左联
SELECT a.runoops_id, a.runoops_author, b.runoops_count FROM runoops_tbl a LEFT JOIN tcount_tbl b ON a.runoops_author = b.runoops_author;

-- LEFT JOIN右联
SELECT a.runoops_id, a.runoops_author, b.runoops_count FROM runoops_tbl a RIGHT JOIN tcount_tbl b ON a.runoops_author = b.runoops_author;

-- 使用 NULL 值
CREATE TABLE runoops_test_tbl (runoops_author varchar(50) NOT NULL,runoops_count INT);
INSERT INTO runoops_test_tbl (runoops_author, runoops_count) values ('runoops', 30);
INSERT INTO runoops_test_tbl (runoops_author, runoops_count) values ('runoops自学教程', NULL);
INSERT INTO runoops_test_tbl (runoops_author, runoops_count) values ('Google', NULL);
INSERT INTO runoops_test_tbl (runoops_author, runoops_count) values ('FaceBook', 100);
SELECT * FROM runoops_test_tbl;
SELECT * FROM runoops_test_tbl WHERE runoops_count = NULL;
SELECT * FROM runoops_test_tbl WHERE runoops_count != NULL;
SELECT * FROM runoops_test_tbl WHERE runoops_count IS NULL;
SELECT * FROM runoops_test_tbl WHERE runoops_count IS NOT NULL;

-- MySQL 正则表达式
SELECT * FROM runoops_tbl WHERE runoops_author REGEXP '^run'; -- 查找runoops_author字段中以'st'为开头的所有数据
SELECT * FROM runoops_tbl WHERE runoops_author REGEXP 'com$'; -- 查找runoops_author字段中以'com'为结尾的所有数据
SELECT * FROM runoops_tbl WHERE runoops_author REGEXP '自学教程'; -- 查找runoops_author字段中包含'自学教程'字符串的所有数据
SELECT * FROM runoops_tbl WHERE runoops_author REGEXP '^[aeiou]|com$';-- 查找runoops_author字段中以元音字符开头或以'com'字符串结尾的所有数据

-- MySQL 事务
CREATE TABLE runoops_transaction_test( id int(5)) engine=innodb;  -- 创建数据表
SELECT * FROM runoops_transaction_test;
BEGIN;
INSERT INTO runoops_transaction_test value(1);
INSERT INTO runoops_transaction_test value(2);
INSERT INTO runoops_transaction_test value(3);
COMMIT;
BEGIN;
INSERT INTO runoops_transaction_test value(11);
INSERT INTO runoops_transaction_test value(12);
ROLLBACK;

-- MySQL 临时表
CREATE TEMPORARY TABLE sales_summary (
product_name VARCHAR(50) NOT NULL
,total_sales DECIMAL(12,2) NOT NULL DEFAULT 0.00
,avg_unit_price DECIMAL(7,2) NOT NULL DEFAULT 0.00
,total_units_sold INT UNSIGNED NOT NULL DEFAULT 0
);

INSERT INTO sales_summary
(product_name, total_sales, avg_unit_price, total_units_sold)
VALUES
('cucumber', 100.25, 90, 2);

SELECT * FROM sales_summary;

DROP TABLE sales_summary;

-- MySQL 复制表
SHOW CREATE TABLE runoops_tbl \G;

CREATE TABLE `clone_tbl` (
  `runoops_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `runoops_title` varchar(100) NOT NULL,
  `runoops_author` varchar(40) NOT NULL,
  `added_date` datetime DEFAULT NULL,
  PRIMARY KEY (`runoops_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO clone_tbl (runoops_id,runoops_title,runoops_author,added_date) SELECT runoops_id,runoops_title,runoops_author,added_date FROM runoops_tbl; -- 克隆表内容


-- MySQL 序列使用
CREATE TABLE insect(
   id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    name VARCHAR(30) NOT NULL,
    date DATE NOT NULL,
    origin VARCHAR(30) NOT NULL
);

INSERT INTO insect (id,name,date,origin) VALUES(NULL,'housefly','2019-09-10','kitchen'),(NULL,'millipede','2019-09-10','driveway'),(NULL,'grasshopper','2019-09-10','front yard');

SELECT * FROM insect ORDER BY id;