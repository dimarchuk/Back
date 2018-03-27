<?php

namespace app\common\components\db\commands;

/**
 * Class Insert
 * @package app\common\components\db\commands
 */
class Insert extends AbstractCommands
{
    public function prepare()
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