<?php
/**
 * 12. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что
 * предложения идут в обратном порядке.
 * Пример:
 * Входная строка: 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь.
 * А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';
 * Строка, возвращенная функцией : 'А там хоть трава не расти. А ларчик просто открывался. А король-то — голый.
 * А вы друзья как ни садитесь, все в музыканты не годитесь. А воз и ныне там.А Васька слушает да ест.'
 */
function stringFlip($string)
{
    mb_internal_encoding("utf-8");
    $text = preg_split('[(\.\ )|(\?\ )|(\!\ )]', "$string", 0,PREG_SPLIT_DELIM_CAPTURE);
    $chunk = array_chunk($text, 2);
    $reverse = array_reverse($chunk);
    $result = "";
    foreach ($reverse as $sentence)
    {
        foreach ($sentence as $text)
        {
            $result .= mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
        }
        $result .= ' ';
    }
    echo $result;
}
if($_POST)
{
    stringFlip($_POST['firstarea']);
}
?>
<form action="12.php" method="post">
    <textarea rows="20" cols="80" name="firstarea"></textarea>
    <button type="submit">Check</button>
</form>
