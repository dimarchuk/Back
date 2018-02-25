<?php
/**
 * 6. Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны
 * помещаться в папку gallery и выводиться на странице в виде таблицы.
 */

$path = './gallery/';

function addImg($path, $file)
{
    $path_to_images = [];
    for ($i = 0; $i < count($file['name']); $i++) {
        $ext = array_pop(explode('.', $file['name'][$i]));
        $new_name = time() . "_{$i}.{$ext}";
        $full_path = $path . $new_name;
        $path_to_images[$i] = $full_path;

        if ($file['error'][$i] == 0) {
            move_uploaded_file($file['tmp_name'][$i], $full_path);
        }
    }
    return $path_to_images;
}

$path_to_images = addImg($path, $_FILES['img']);


$str = "<table border=\"1\"><tr>";

for ($i = 0; $i < count($path_to_images); $i++) {
    $str .= "<td><img src=\"" . $path_to_images[$i] . "\" alt=\"\"></td>";
}

echo $str .= "</tr></table>";


