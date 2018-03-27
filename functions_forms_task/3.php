<?php
/**
 * 3. Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов. Значение N
 * задавать через форму. Проверить работу на кириллических строках - найти ошибку, найти решение.
 */

function delWords()
{
    $e = "";
    $number = $_POST['num'];
    $a = file("3.txt");

    for ($i = 0; $i <= count($a); $i++) {
        $e .= trim($a[$i]);
    }

    $words = explode(" ", $e);

    for ($i = 0; $i < count($words); $i++) {

        if (strlen($words[$i]) <= $number) {
            $rez[] = $words[$i];
        }
    }
    $fp = fopen("3.txt", "w");
    $str = (implode(" ", $rez));
    $test = fwrite($fp, $str);
    if ($test) echo 'Данные в файл успешно занесены.';
    else echo 'Ошибка при записи в файл.';
    fclose($fp); //Закрытие файла
}


delWords();