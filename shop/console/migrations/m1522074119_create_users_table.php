<?php

namespace app\console\migrations;

use app\common\Application;
use app\common\components\MigratebleIntarface;

/**
 * Class m1522074119_create_users_table
 * @package app\console\migrations
 */
class m1522074119_create_users_table implements MigratebleIntarface
{

    public function up()
    {
        $sql = <<<SQL
CREATE TABLE users (
  id INT(11) AUTO_INCREMENT,
  name VARCHAR(255),
  PRIMARY KEY (id)
)
SQL;

        Application::get()->getDb()->query($sql)->execute();
    }

    public function down()
    {
        $sql = 'DROP TABLE users';

        Application::get()->getDb()->query($sql)->execute();
    }
}
