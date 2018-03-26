<?php

namespace app\common\components;

/**
 * Interface MigratebleIntarface
 * @package app\common\components
 */
interface MigratebleIntarface
{
    public function up();

    public function down();
}