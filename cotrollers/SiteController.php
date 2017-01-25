<?php

require 'models/MainClass.php';
require 'helpers/ClientClass.php';
require 'cotrollers/constan.php';
require 'models/FindClass.php';
$slug = $_SERVER['QUERY_STRING'];

$act = new ClientClass();// Для вибору активного меню
$main = new MainClass();
$my_menu = $main->showMenu();
$content = 'main';
$my_left_menu = $main->showLeftMenu();

$FindClass = new FindClass();



if (!empty($slug)){
    echo 'Другие страници';
    $id = $main->categoruId($slug);//іd категорії

        if (!empty($id)){
            $main_content = $main->categoruArticle($id);
        }else{

            $my_article = $main->findArticleSlug($slug);


            if ($slug == ABOUT_US){
                $content = ABOUT_US;
            }
            else if (!empty($my_article)){
                $main_content = $my_article;
                $content = 'article';
            }
            else if (is_numeric($slug) == true){
                $main_content = $main->findArticle($slug);
                $content = 'article';
            }
            else if($slug == FIND) {
                $content = FIND;
                $find_slag = $_POST['words'];
                $main_content = $FindClass->searchArticles($find_slag);


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