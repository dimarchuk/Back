<?php

namespace app\common\components\request;

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

    protected abstract function parse(): void;

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

}