<?php

namespace app\common\components\request;

use Exception;
use app\common\Application;
use app\common\components\Controller;
use app\common\helper\StringHelper;

/**
 * Class WebRequest
 * @package app\common\components\request
 */
class WebRequest extends Request
{
    protected function parse(): void
    {
        $parts = explode('/', trim($this->request, " \t\n\r\0\x0B/"));

        $controllerPart = array_shift($parts);
        $this->controller = $this->prepareController($controllerPart);

        $actionPart = array_shift($parts);
        $this->action = $this->prepareAction($actionPart);
    }

    /**
     * @param string $part
     * @return Controller
     * @throws Exception
     */
    private function prepareController(string $part): Controller
    {
        $part = $part ?: Application::get()->param('controllers.default');

        $class = vsprintf('%s\%sController', [
            Application::get()->param('controllers.namespace'),
            StringHelper::camelize($part)
        ]);

        if (!class_exists($class)) {
            throw new Exception("Class {$part} is not exists");
        }

        $controllerObject = new $class();
        if (!$controllerObject instanceof Controller) {
            throw new Exception("Controller {$part} is invalid");
        }

        return new $class();
    }

    /**
     * @param string $part
     * @return string
     * @throws Exception
     */
    public function prepareAction(string $part): string
    {
        $part = $part ?: Application::get()->param('actions.default');
        $action = 'action' . StringHelper::camelize($part);

        if (!method_exists($this->controller, $action)) {
            throw new Exception("Method {$part} is not exists");
        }

        return $action;
    }

}