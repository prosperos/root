<?php

require 'models/MainClass.php';
$chpu = $_SERVER['QUERY_STRING'];
echo $chpu;
$main = new MainClass();
$my_menu = $main->showMenu();
$content = 'main';
$my_left_menu = $main->showLeftMenu();


if (!empty($chpu)){
    echo 'Другие страници';
    $id = $main->categoruId($chpu);//іd категорії
    $main_content = $main->categoruArticle($id);
}else{
    echo 'Головна';
    $main_content = $main->showArticles();
}
?>