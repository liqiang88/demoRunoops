<?php
/**
 * PHP 7 异常
 *
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 22:03
 */

ini_set('zend.assertions', 1);
ini_set('assert.exception', 1);

assert(true == false);
echo 'Hi!';