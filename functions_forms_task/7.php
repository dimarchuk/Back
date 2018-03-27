<?php
/**
 * 7. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.
 */

$comment = $_POST;
$file = '7.txt';

function add($comment, $file)
{
    unset($comment['btn']);
    $sComment = serialize($comment);

    $current = file_get_contents($file);

    if (strlen($current) != 0) {
        $current .= "/$sComment";
    } else $current = $sComment;

    file_put_contents($file, $current);
}

function view($file) {
    $str = file_get_contents($file);
    $comments = explode("/", $str);
    foreach ($comments as $comment) {
        $arr_comments[] = unserialize($comment);
    }

    foreach ($arr_comments as $arr_comment) {
        $str = "<b>Имя: </b>{$arr_comment['name']}<br><b>Коментарий: </b>{$arr_comment['comment']}<hr>";
        echo $str;
    }

}


if (isset($_POST['btn'])) {
    add($comment, $file);
    view($file);
} else if (file_get_contents($file) != 0) view($file);

include_once "./index7.php";