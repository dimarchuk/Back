<?php

namespace app\common\helper;

/**
 * Class StringHelper
 * @package app\common\helper
 */
class StringHelper
{
    /**
     * @param string $string
     * @param string $symbol
     * @param bool $ucFirst
     * @return string
     */
    public static function camelize(string $string, string $symbol = '-', bool $ucFirst = true)
    {
        $parts = explode($symbol, $string);

        $rezult = $ucFirst ? '' : strtolower(array_shift($parts));

        foreach ($parts as $part) {
            $rezult .= ucfirst(strtolower($part));
        }

        return $rezult;
    }
}