<?php
//使用 Filter Callback
function convertSpace($string){
    return str_replace("_", ".", $string);
}

$string = "www_runoops_com!";

echo filter_var($string, FILTER_CALLBACK,
    array("options" => "convertSpace"));
?>