<?php
//MySQL JOIN 测试
$dbhost = 'localhost';      // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'root';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
    die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");

//MySQL INNER JOIN 测试
$sql = 'SELECT a.runoops_id, a.runoops_author, b.runoops_count FROM runoops_tbl a INNER JOIN tcount_tbl b ON a.runoops_author = b.runoops_author';

//MySQL LEFT JOIN 测试
//$sql = 'SELECT a.runoops_id, a.runoops_author, b.runoops_count FROM runoops_tbl a LEFT JOIN tcount_tbl b ON a.runoops_author = b.runoops_author';

//MySQL RIGHT JOIN 测试
//$sql = 'SELECT a.runoops_id, a.runoops_author, b.runoops_count FROM runoops_tbl a RIGHT JOIN tcount_tbl b ON a.runoops_author = b.runoops_author';

mysqli_select_db( $conn, 'runoops' );
$retval = mysqli_query( $conn, $sql );
if(! $retval ) {
    die('无法读取数据: ' . mysqli_error($conn));
}
echo '<h3>MySQL JOIN 测试</h3>';
echo '<table border="1"><tr><td>教程 ID</td><td>作者</td><td>登录次数</td></tr>';
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    echo "<tr><td> {$row['runoops_id']}</td> ".
        "<td>{$row['runoops_author']} </td> ".
        "<td>{$row['runoops_count']} </td> ".
        "</tr>";
}
echo '</table>';
// 释放内存
mysqli_free_result($retval);
mysqli_close($conn);
?>