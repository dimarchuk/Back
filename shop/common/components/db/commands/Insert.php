<?php

namespace app\common\components\db\commands;

/**
 * Class Insert
 * @package app\common\components\db\commands
 */
class Insert extends AbstractCommands
{
    /**
     * @var string
     */
    private $table;

    /**
     * @param string $table
     * @return Insert
     */
    public function table(string $table): Insert
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @var array
     */
    private $collumns;

    /**
     * @param array $collumns
     * @return Insert
     */
    public function values(array $collumns): Insert
    {
        $this->collumns = $collumns;
        return $this;
    }

    public function preparee()
    {
        $keys = array_keys($this->collumns);

        $attributes = [];
        foreach ($keys as $key) {
            $attribute = ":{$key}";
            $attributes[] = $attribute;
            $this->params[$attribute] = $this->collumns[$key];
        }


        $this->sql = 'INSERT INTO ' . $this->table . '(' . implode(', ', $keys) . ') VALUES (' . implode(', ', $attributes) . ')';
    }
}