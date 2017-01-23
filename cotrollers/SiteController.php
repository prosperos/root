<?php

require 'models/MainClass.php';
require 'helpers/ClientClass.php';
require 'cotrollers/constan.php';
require 'models/FindClass.php';
$slug = $_SERVER['QUERY_STRING'];
var_dump(is_numeric($slug));
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
            }
            else if (is_numeric($slug) == true){
                $main_content = $main->findArticle($slug);
                $content = 'article';
            }
            else if($find_slag) {

                var_dump($slag);
                $main_content = $main->searchArticles($find_slag);
                $content = FIND;
            }
            else{
                $main_content = $main->findStractId($slug);
                $content = 'page';
            }
        }


}else{
    echo 'Головна';
    $main_content = $main->showArticles();
}
?>