<?php
/**
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-07
 * Time: 9:07
 */
 $slashesStr = addcslashes('foo[ ]', 'A..z');
// 输出：\f\o\o\[ \]
// 所有大小写字母均被转义
// ... 但 [\]^_` 以及分隔符、换行符、回车符等也一并被转义了。

$a = stripslashes($slashesStr);
var_dump($a);

// 设定$name 中插入了我们不需要的SQL语句
//$name = "Qadir'; DELETE FROM users;";
//mysqli_query($conn, "SELECT * FROM users WHERE name='{$name}'");

$q = get_magic_quotes_gpc();
var_dump($q);

$sub = addcslashes(mysqli_real_escape_string($conn, "%something_"), "%_");
// $sub == \%something\_
mysqli_query($conn, "SELECT * FROM messages WHERE subject LIKE '{$sub}%'");