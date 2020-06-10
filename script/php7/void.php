<?php
/**
 * void 函数
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 20:56
 */

function swap(&$left, &$right) : void
{
    if ($left === $right) {
        return;
    }

    $tmp = $left;
    $left = $right;
    $right = $tmp;
}

$a = 1;
$b = 2;
var_dump(swap($a, $b), $a, $b);