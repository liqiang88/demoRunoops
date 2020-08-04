<?php
/**
 * 严格模式
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 20:45
 */

declare(strict_types=1);

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