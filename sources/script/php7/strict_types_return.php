<?php
/**
 * 返回类型声明
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 20:52
 */

declare(strict_types=1);

//正确
function returnIntValue(int $value): int
{
    return $value;
}

//错误
//function returnIntValue(int $value): int
//{
//    return $value + 1.0;
//}


print(returnIntValue(5));