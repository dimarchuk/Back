<?php

require_once __DIR__ . '/vendor/autoload.php';

$t = (new \app\common\components\request\Parser($argv))->getRequest();
var_dump($t);