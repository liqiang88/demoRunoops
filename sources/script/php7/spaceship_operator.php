<?php
/**
 * PHP 太空船运算符（组合比较符）
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 21:13
 */

// 整型比较
print( 1 <=> 1);print(PHP_EOL);
print( 1 <=> 2);print(PHP_EOL);
print( 2 <=> 1);print(PHP_EOL);
print(PHP_EOL); // PHP_EOL 为换行符

// 浮点型比较
print( 1.5 <=> 1.5);print(PHP_EOL);
print( 1.5 <=> 2.5);print(PHP_EOL);
print( 2.5 <=> 1.5);print(PHP_EOL);
print(PHP_EOL);

// 字符串比较
print( "a" <=> "a");print(PHP_EOL);
print( "a" <=> "b");print(PHP_EOL);
print( "b" <=> "a");print(PHP_EOL);
?>