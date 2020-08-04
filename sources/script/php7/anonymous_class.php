<?php
/**
 * PHP 匿名类
 * Created by PhpStorm.
 * User: luo
 * Date: 2020-06-10
 * Time: 21:18
 */

interface Logger {
    public function log(string $msg);
}

class Application {
    private $logger;

    public function getLogger(): Logger {
        return $this->logger;
    }

    public function setLogger(Logger $logger) {
        $this->logger = $logger;
    }
}

$app = new Application;
// 使用 new class 创建匿名类
$app->setLogger(new class implements Logger {
    public function log(string $msg) {
        print($msg);
    }
});

$app->getLogger()->log("我的第一条日志");
?>