<?php

namespace app\common\components\db\commands;

use app\common\Application;
use Dump\Dump;
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

    abstract public function prepare();

    /**
     * @var string
     */
    protected $table;

    /**
     * @param string $table
     * @return AbstractCommands
     */
    public function table(string $table): AbstractCommands
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @var array
     */
    protected $collumns;

    /**
     * @param array $collumns
     * @return AbstractCommands
     */
    public function collumns(array $collumns): AbstractCommands
    {
        $this->collumns = $collumns;
        return $this;
    }

    /**
     * @var array
     */
    protected $conditions = [];

    /**
     * @param array $conditions
     * @return AbstractCommands
     */
    public function where(array $conditions): AbstractCommands
    {
        $this->conditions[] = $conditions;
        return $this;
    }

    /**
     * @param array $conditions
     * @return AbstractCommands
     */
    public function andWhere(array $conditions): AbstractCommands
    {
        $this->conditions[] = $conditions;
        return $this;
    }

    /**
     * @param array $conditions
     * @return AbstractCommands
     */
    public function orWhere(array $conditions): AbstractCommands
    {
        $this->conditions[] = $conditions;
        return $this;
    }


    /**
     * @return bool
     */
    public function execute($debug = false): bool
    {
        $this->prepare();

        $stmt = $this->connection->prepare($this->sql);
        $rezult = $stmt->execute($this->params);

        if ($debug === true) {
            new Dump($this->connection->errorInfo());
        }

        return $rezult;
    }
}