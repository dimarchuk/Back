<?php
/**
 * 5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
 * Директория и искомое слово задаются как параметры функции.
 */


function dirFiles($dir, $word) {

    $f = scandir($dir);
    foreach ($f as $file){
        if (strstr($file, $word)) {
            echo $file .'<br/>';
        }

    }
}

dirFiles('./', 'index');