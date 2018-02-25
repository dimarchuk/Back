<?php

/**
 * 1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова, которые
 * есть и в первом и во втором поле ввода. Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b),
 * которая будет возвращать массив с общими словами.
 *
 * @var string $first
 * @var string $second
 */

$first = $_POST['first'];

$second = $_POST['second'];

function getCommonWords($a, $b){
    $words_a = explode(" ", $a);
    $words_b = explode(" ", $b);
  foreach ($words_a as $word_a) {
      foreach ($words_b as $word_b) {
          if($word_a == $word_b) {
              echo "{$word_a} <br>";
          }
      }
  }
}

getCommonWords($first, $second);