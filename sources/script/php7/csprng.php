<?php
/**
 * CSPRNG（Cryptographically Secure Pseudo-Random Number Generator，伪随机数产生器）
 *
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 21:42
 */

$bytes = random_bytes(5);
print(bin2hex($bytes));
print(PHP_EOL);
print(random_int(100, 999));
print(PHP_EOL);
print(random_int(-1000, 0));
