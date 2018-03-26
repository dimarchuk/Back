<?php

namespace app\common\components\request;

use Exception;
use app\common\Application;
use app\common\helper\StringHelper;
use app\common\components\Controller;

/**
 * Interface Request
 * @package app\common\components\request
 */
abstract class Request
{
    /**
     * @var array|string
     */
    protected $request;

    /**
     * @var Controller
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * Request constructor.
     * @param array|string $request
     */
    public function __construct($request)
    {
        $this->request = $request;

        $this->parse();
    }

    protected abstract function parse();//: void;

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param string|null $part
     * @return Controller
     * @throws Exception
     */
    protected function prepareController(string $part = null): Controller
    {
        $part = $part ?: Application::get()->param('controllers.default');

        $class = vsprintf('%s\%sController', [
            Application::get()->param('controllers.namespace'),
            StringHelper::camelize($part)
        ]);

        if (!class_exists($class)) {
            throw new Exception("Controller {$part} is not exists");
        }

        $controllerObject = new $class();
        if (!$controllerObject instanceof Controller) {
            throw new Exception("Controller {$part} is invalid");
        }

        return new $class();
    }

    /**
     * @param string|null $part
     * @return string
     * @throws Exception
     */
    protected function prepareAction(string $part = null): string
    {
        $part = $part ?: Application::get()->param('actions.default');
        $action = 'Action' . StringHelper::camelize($part);

        if (!method_exists($this->controller, $action)) {
            throw new Exception("Method {$part} is not exists");
        }

        return $action;
    }

    /**
     * @param mixed $params
     * @return array
     */
    protected abstract function prepareParams($params): array;
}