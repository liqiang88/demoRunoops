<?php
/**
 * PHP NULL 合并运算符
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 21:01
 */

// 获取 $_GET['site'] 的值，如果不存在返回 '自学教程'
$site = $_GET['site'] ?? '自学教程';

print($site);
print(PHP_EOL); // PHP_EOL 为换行符


// 以上代码等价于
$site = isset($_GET['site']) ? $_GET['site'] : '自学教程';

print($site);
print(PHP_EOL);

$site = $_GET['site'] ?? $_POST['site'] ?? '自学教程';

print($site);