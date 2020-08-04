<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML5 颜色 - 自学教程（runoops.com）</title>
</head>
<body>
<?php
$favcolor = isset($_GET['favcolor']) ? $_GET['favcolor'] : '';

if(strlen($favcolor) > 10){
    die('String to long');
}
echo $favcolor;

?>
</body>
</html>