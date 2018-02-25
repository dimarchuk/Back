<?php
/**
 * 4. Написать функцию, которая выводит список файлов в заданной директории.
 * Директория задается как параметр функции.
 */

function dirFiles($dir) {

    $f = scandir($dir);
    foreach ($f as $file){
            echo $file .'<br/>';
    }
}

dirFiles('./');