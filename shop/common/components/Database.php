<?php

namespace app\common\components;

use PDO;
use app\common\components\db\Builder;
use app\common\components\db\commands\{
    AbstractCommands, Insert, Update
};

/**
 * Class Database
 * @package app\common\components
 */
class Database
{
    /**
     * @var null|PDO
     */
    private $connect = null;

    /**
     * Database constructor.
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $db
     */
    public function __construct(string $host, string $user, string $password, string $db)
    {
        $this->connect = new PDO("mysql:host={$host}; dbname={$db}", $user, $password);
    }

    /**
     * @param string $table
     * @param array $data
     * @return Insert|AbstractCommands
     * @throws \Exception
     */
    public function insert(string $table, array $data): Insert
    {
        /** @var Insert $builder */
        $builder = Builder::build(Builder::INSERT, $this->connect);
        return $builder->table($table)->collumns($data);
    }

    /**
     * @param string $table
     * @param array $data
     * @param array $conditions
     * @return Update
     * @throws \Exception
     */
    public function update(string $table, array $data, array $conditions = []): Update
    {
        /** @var Update $builder */
        $builder = Builder::build(Builder::UPDATE, $this->connect);
        return $builder->table($table)->collumns($data)->where($conditions);
    }
}