<?php
if(!file_exists("hello.txt")) {
    die("文件不存在");
} else {
    $file=fopen("hello.txt","r");
}

function customError($errno, $errstr){
    echo "<b>Error:</b> [$errno] $errstr<br>";
    echo "脚本结束";
    die();
}
?>