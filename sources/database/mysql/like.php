<?php
//MySQL LIKE 子句测试
$dbhost = 'localhost';      // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'root';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
    die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");

// 读取 runoops_author 为 runooops.com 的数据
$sql = 'SELECT * 
        FROM runoops_tbl
        WHERE runoops_author LIKE "%com"';

mysqli_select_db( $conn, 'runoops' );
$retval = mysqli_query( $conn, $sql );
if(! $retval ) {
    die('无法读取数据: ' . mysqli_error($conn));
}
echo '<h3>MySQL LIKE 子句测试</h3>';
echo '<table border="1"><tr><td>教程 ID</td><td>标题</td><td>作者</td><td>提交日期</td></tr>';
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    echo "<tr><td> {$row['runoops_id']}</td> ".
        "<td>{$row['runoops_title']} </td> ".
        "<td>{$row['runoops_author']} </td> ".
        "<td>{$row['added_date']} </td> ".
        "</tr>";
}
echo '</table>';
// 释放内存
mysqli_free_result($retval);
mysqli_close($conn);
?>