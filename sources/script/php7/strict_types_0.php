<?php
/**
 * 强制模式
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 20:43
 */

/**
 * @param int[] ...$ints
 * @return float|int
 */
function sum(int ...$ints)
{
    return array_sum($ints);
}

print(sum(2, '3', 4.1));
?>