<?php

function actionList()
{
    render('/messages/list');
}

function actionCreate()
{
    $path = config('storagePath');
    $file = $path . '/' . getUniqueFileName($path, 'txt');
var_dump($path);
    $messageString = serialize($_POST);
    file_put_contents($file, $messageString);

    redirect(toUrl('/messages/list'));

}