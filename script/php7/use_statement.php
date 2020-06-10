<?php
/**
 * PHP 7 use 语句
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 22:10
 */

// PHP 7 之前版本需要使用多次 use
//use some\namespace\ClassA;
//use some\namespace\ClassB;
//use some\namespace\ClassC as C;
//
//use function some\namespace\fn_a;
//use function some\namespace\fn_b;
//use function some\namespace\fn_c;
//
//use const some\namespace\ConstA;
//use const some\namespace\ConstB;
//use const some\namespace\ConstC;
//
//// PHP 7+ 之后版本可以使用一个 use 导入同一个 namespace 的类
//use some\namespace\{ClassA, ClassB, ClassC as C};
//use function some\namespace\{fn_a, fn_b, fn_c};
//use const some\namespace\{ConstA, ConstB, ConstC};