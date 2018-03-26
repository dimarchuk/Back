<?php

namespace app\common;

use app\common\components\request\Parser;
use Exception;
use app\common\helper\ArrayHelper;
use PDO;

/**
 * Class Application
 * @package app\common
 */
class Application
{
    /**
     * Application constructor.
     */
    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @var null|Application
     */
    public static $app = null;

    /**
     * @var array
     */
    private $config;

    /**
     * @param array $config
     * @return string
     * @throws Exception
     */
    public static function init(array $config): string
    {
        if (null !== self::$app) {
            throw new Exception('Application is already created');
        }

        self::$app = new self();
        self::$app->config = $config;
        return self::$app->run();
    }

    /**
     * @return Application
     * @throws Exception
     */
    public static function get(): Application
    {
        if (null === self::$app) {
            throw new Exception('Application is not created');
        }

        return self::$app;
    }

    public function run()
    {
        $request = (new Parser())->getRequest();

        $controller = $request->getController();
        $action = $request->getAction();
        $params = $request->getParams();
        return call_user_func_array([$controller, $action], $params);
    }

    /**
     * @param string $key
     * @return string
     */
    public function param(string $key): string
    {
        return ArrayHelper::getValue($key, $this->config, 'index');
    }

    /**
     * @var null|PDO
     */
    private $db = null;

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        if (null === $this->db) {

            $this->db = new PDO("mysql:host={$this->param('db.host')};dbname={$this->param('db.name')}",
                $this->param('db.user'),
                $this->param('db.password')
            );
        }

        return $this->db;
    }
}