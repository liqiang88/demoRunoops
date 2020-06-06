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
