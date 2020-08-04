<?php
//MySQL 事务测试
$dbhost = 'localhost';      // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'root';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
    die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");

mysqli_select_db( $conn, 'runoops' );
mysqli_query($conn, "SET AUTOCOMMIT=0"); // 设置为不自动提交，因为MYSQL默认立即执行
mysqli_begin_transaction($conn);            // 开始事务定义
$sql = 'INSERT INTO runoops_transaction_test value(31)';
$retval = mysqli_query( $conn, $sql );
if(!$retval ) {
    mysqli_query($conn, "ROLLBACK");     // 判断当执行失败时回滚
}else{
    echo 'success';
}
mysqli_commit($conn);            //执行事务
mysqli_close($conn);
?>