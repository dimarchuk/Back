<?php

namespace app\common\components\db\commands;

use Dump\Dump;

/**
 * Class Update
 * @package app\common\components\db\commands
 */
class Update extends AbstractCommands
{
    public function prepare()
    {
        $keys = array_keys($this->collumns);

        $attributes = [];
        foreach ($keys as $key) {
            $attribute = ":{$key}";
            $attributes[] = "{$key} = {$attribute}";
            $this->params[$attribute] = $this->collumns[$key];
        }

        $this->sql = 'UPDATE ' . $this->table . ' SET ' . implode(', ', $attributes);

        new Dump($this->sql);exit;
    }
}