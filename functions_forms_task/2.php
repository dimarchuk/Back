<?php
/**
 * 2. Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте.
 * Реализовать с помощью функции.
 *
 * @var string $str
 */

$str = $_POST['str'];

function longestWords($str)
{
    $words = explode(" ", $str);

    if (count($words) == 3) {
        foreach ($words as $word) {
            echo "{$word} <br>";
        }
    } else {
        for ($j = 0; $j < 3; $j++) {
            $word_length = 0;
            for ($i = 0; $i <= count($words); $i++) {

                if ($word_length < strlen($words[$i])) {
                    $word_length = strlen($words[$i]);
                    $word_index = $i;
                }
            }
            echo "{$words[$word_index]} <br>";
            unset($words[$word_index]);
            sort($words);

        }

    }
}

longestWords($str);