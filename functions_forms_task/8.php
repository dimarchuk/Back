<?php
/**
 * 8. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем. Реализовать проверку на наличие в тексте запрещенных
 * слов, матов. При наличии таких слов - выводить сообщение "Некорректный комментарий". Реализовать удаление из
 * комментария всех тегов, кроме тега <b>.
 */

$comment = $_POST;
$file = '8.txt';

$nonNormative = ['мат1', 'мат2', 'мат3', 'мат4'];

function nonNormative($str, $nonNormative)
{
    $arr_str = explode(" ", $str);
    for ($i = 0; $i < count($arr_str); $i++) {
        for ($j = 0; $j < count($nonNormative); $j++) {
            if (strstr($arr_str[$i], $nonNormative[$j])) {
                return false;
                break;
            }
        }
    }
    return true;
}


function add($comment, $file, $non = true)
{
    unset($comment['btn']);

    $sComment = serialize($comment);

    $current = file_get_contents($file);

    if (strlen($current) != 0) {
        $current .= "/{$sComment}";
    } else $current = $sComment;

    file_put_contents($file, $current);
}

function view($file)
{
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
    strip_tags($_POST['comment'], '<b>');
    strip_tags($_POST['name'], '<b>');
    $non = nonNormative($_POST['comment'], $nonNormative);
    if ($non == false) {
        echo "Некорректный комментарий";
    } else {
        add($comment, $file, $non);
        view($file);
    }
} else if (file_get_contents($file) != 0) view($file);

include_once "./index8.php";