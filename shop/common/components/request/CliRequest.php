<?php

namespace app\common\components\request;

use app\common\helper\ArrayHelper;

/**
 * Class CliRequest
 * @package app\common\components\request
 */
class CliRequest extends Request
{
    protected function parse()
    {
        $request = $this->request;
        array_shift($request);

        $actionString = array_shift($request);
//        $actionString = ArrayHelper::getValue(0, $request);

        $parts = explode('/', trim($actionString, " \t\n\r\0\x0B/"));

        $controllerPart = array_shift($parts);
        $this->controller = $this->prepareController($controllerPart);

        $actionPart = array_shift($parts);
        $this->action = $this->prepareAction($actionPart);

        $this->params = $this->prepareParams($request);
    }

    /**
     * @param mixed $params
     * @return array
     */
    protected function prepareParams($params): array
    {
        return $params;
    }
}