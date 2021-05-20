<?php
/**
 * PHP IntlChar()
 *
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 21:33
 */

printf('%x', IntlChar::CODEPOINT_MAX);
echo IntlChar::charName('@');
var_dump(IntlChar::ispunct('!'));