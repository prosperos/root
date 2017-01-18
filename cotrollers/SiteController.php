<?php

require 'models/MainClass.php';
$slug = $_SERVER['QUERY_STRING'];

$main = new MainClass();
$my_menu = $main->showMenu();
$content = 'main';
$my_left_menu = $main->showLeftMenu();


if (!empty($slug)){
    echo 'Другие страници';
    $id = $main->categoruId($slug);//іd категорії
    $main_content = $main->categoruArticle($id);
}else{
    echo 'Головна';
    $main_content = $main->showArticles();
}
?>