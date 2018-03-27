<?php
/**
 * 11. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что каждое
 * новое предложение начиняется с большой буквы.
 * Пример:
 * Входная строка: 'а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь.
 * а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';
 * Строка, возвращенная функцией : 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь.
 * А король-то — голый. А ларчик просто открывался.А там хоть трава не расти.';
 */
function stringUpperCase($string)
{

//    mb_internal_encoding("utf-8");
    $text = preg_split('/[.?!] /', $string, 0,PREG_SPLIT_DELIM_CAPTURE);
    $result = "";
    foreach ($text as $sent)
    {
        $result .= mb_strtoupper(mb_substr($sent, 0, 1)).mb_substr($sent, 1)." ";
    }
    echo $result;
}
if($_POST)
{
    stringUpperCase($_POST['firstarea']);
}
?>
<form action="11.php" method="POST">
    <textarea rows="20" cols="80" name="firstarea"></textarea>
    <button type="submit">OK</button>
</form>