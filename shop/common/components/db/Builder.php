<?php

namespace app\common\components\db;

use PDO;
use app\common\components\db\commands\{
    AbstractCommands, Insert
};

/**
 * Class Builder
 * @package app\common\components\db
 */
class Builder
{
    public const INSERT = 'insert';
    public const UPDATE = 'update';
    public const DELETE = 'delete';
    public const CREATE_TABLE = 'create_table';
    public const DROP_TABLE = 'drop_table';

    /**
     * @param string $command
     * @param PDO $connection
     * @return AbstractCommands
     */
    public static function build(string $command, PDO $connection): AbstractCommands
    {
        switch ($command) {
            case self::INSERT:
                return new Insert($connection);
        }
    }
}