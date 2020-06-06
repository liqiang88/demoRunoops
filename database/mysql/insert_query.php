<?php
//MySQL 插入数据
$dbhost = 'localhost';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'root';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
    die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");

$runoops_title = '学习 MySQL';
$runoops_author = 'runoops.com';
$added_date = '2020-06-06';

$sql = "INSERT INTO runoops_tbl ".
    "(runoops_title,runoops_author, added_date) ".
    "VALUES ".
    "('$runoops_title','$runoops_author','$added_date')";

mysqli_select_db( $conn, 'runoops' );
$retval = mysqli_query( $conn, $sql );
if(! $retval ) {
    die('无法插入数据: ' . mysqli_error($conn));
}
echo "数据插入成功\n";
mysqli_close($conn);
?>