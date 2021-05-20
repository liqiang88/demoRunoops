<?php
/**
 * PHP 7 Session 选项
 *
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 22:25
 */

session_start([
    'cache_limiter' => 'private',
    'read_and_close' => true,
]);