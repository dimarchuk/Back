<?php

namespace app\common\components\db\commands;

use PDO;

/**
 * Class AbstractCommands
 * @package app\common\components\db\commands
 */
abstract class AbstractCommands
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * AbstractCommands constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @var string
     */
    protected $sql;

    /**
     * @var array
     */
    protected $params = [];

    abstract public function preparee();

    /**
     * @return bool
     */
    public function execute(): bool
    {
        $this->preparee();

        $stmt = $this->connection->prepare($this->sql);
        $rezult = $stmt->execute($this->params);

        return $rezult;
    }
}