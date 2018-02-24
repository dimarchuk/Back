<?php

function actionList()
{
    render('/messages/list');
}

function actionCreate()
{
    var_dump($_POST);
}