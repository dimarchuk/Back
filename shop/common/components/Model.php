<?php

namespace app\common\components;

use PDO;
use app\common\Application;

/**
 * Class Model
 * @package app\common\components
 */
class Model
{
    /**
     * @return PDO
     * @throws \Exception
     */
    protected function getConnection(): PDO
    {
       return Application::get()->getDb();
    }
}