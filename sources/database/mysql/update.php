<?php
//MySQL UPDATE 语句测试
$dbhost = 'localhost';      // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'root';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
    die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");

$sql = 'UPDATE runoops_tbl
        SET runoops_title="学习 Python"
        WHERE runoops_id=3';

mysqli_select_db( $conn, 'runoops' );
$retval = mysqli_query( $conn, $sql );
if(! $retval ) {
    die('无法更新数据: ' . mysqli_error($conn));
}
echo '数据更新成功！';
mysqli_close($conn);
?>