<?php

require 'models/MainClass.php';
require 'helpers/ClientClass.php';
require 'cotrollers/constan.php';
$slug = $_SERVER['QUERY_STRING'];

$act = new ClientClass();// Для вибору активного меню
$main = new MainClass();
$my_menu = $main->showMenu();
$content = 'main';
$my_left_menu = $main->showLeftMenu();



if (!empty($slug)){
    echo 'Другие страници';
    $id = $main->categoruId($slug);//іd категорії

        if (!empty($id)){
            $main_content = $main->categoruArticle($id);
            
        }else{
            if ($slug == ABOUT_US){
                $content = ABOUT_US;
            }else{
                $main_content = $main->findStractId($slug);
                $content = 'page';
            }
        }


}else{
    echo 'Головна';
    $main_content = $main->showArticles();

}
?>