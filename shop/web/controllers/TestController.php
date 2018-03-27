<?php

namespace app\web\controllers;

use app\common\Application;
use app\common\components\Controller;
use Dump\Dump;

/**
 * Class TestController
 * @package app\web\controllers
 */
class TestController extends Controller
{
    public function actionQwerty()
    {
        $rezult = Application::get()
            ->getDb()
            ->insert('test', [
                    'title' => 'some 2',
                    'author' => 'Dima 2']
            )->execute();

        new Dump($rezult);
        exit;
    }
}