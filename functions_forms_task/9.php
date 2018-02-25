<?php
/**
 * 9. Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba". Ввод текста реализовать
 * с помощью формы.
 */

$str = $_POST['text'];

function reverse($str) {
    $new_str = "";
    for ($i = strlen($str); $i >= 0; $i--) {
        $new_str .= $str[$i];
    }
    echo $new_str;
}


reverse($str);
include_once "./index9.php";