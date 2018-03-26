<?php

namespace app\console\models;

use PDO;
use app\common\Application;
use app\common\components\Model;

/**
 * Class Migration
 * @package app\console\models
 */
class Migration extends Model
{
    public function __construct()
    {
        $this->init();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function tableName()
    {
        return Application::get()->param('migrations.table');
    }

    public function init()
    {
        $table = $this->tableName();

        $sql = 'SHOW TABLES LIKE :table_name';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindParam(':table_name', $table, PDO::PARAM_STR);

        $result = $stmt->execute();
        $exists = $result && $stmt->rowCount();

        if (!$exists) {
            $sql = <<<SQL
CREATE TABLE {$table} (
  id INT(11) AUTO_INCREMENT,
  migration VARCHAR(255),
  execution_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
)
SQL;

            $this->getConnection()->query($sql)->execute();
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getExecuted(): array
    {
        $sql = "SELECT migration FROM {$this->tableName()}";
        $stmt = $this->getConnection()->prepare($sql);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}