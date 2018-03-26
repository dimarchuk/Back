<?php

namespace app\common\helper;

/**
 * Class FileHelper
 * @package app\common\helper
 */
class FileHelper
{
    /**
     * @param string $dir
     * @return array
     */
    public static function getList(string $dir): array
    {
        $elements = scandir($dir);
        return array_filter($elements, function ($item) {
            return !in_array($item, ['.', '..']);
        });
    }
}