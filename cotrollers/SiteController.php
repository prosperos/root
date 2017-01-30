<?php

require 'models/MainClass.php';
require 'helpers/ClientClass.php';
require 'cotrollers/constan.php';
require 'models/FindClass.php';
$slug = $_SERVER['QUERY_STRING'];

$route = $_GET['route'];
$slug = $route;

$act = new ClientClass();// Для вибору активного меню
$main = new MainClass();
$FindClass = new FindClass();
$my_menu = $main->showMenu();
$content = 'main';
$my_left_menu = $main->showLeftMenu();
$type_article = $FindClass->takeTypeArticle();




if (!empty($slug)){

    $id = $main->categoruId($slug);//іd категорії

        if (!empty($id)){
            $main_content = $main->categoruArticle($id);
            if($slug == 'vse_predmety'){
                $main_content = $main->showArticles();

            }
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

            else if ( $slug == 'blog') {
                $main_content = $main->showArticles();
            }
            else if ($slug == 'news'){
                $main_content = $main->findNewsArticle($slug);
                $content = 'filter_article';
                }
            else if ($slug == 'free_video'){
                $main_content = $main->findNewsArticle($slug);
                $content = 'filter_article';
            }
            else if ($slug == 'tips'){
                $main_content = $main->findNewsArticle($slug);
                $content = 'filter_article';
            }
            else if ($slug == 'raznoe'){
                $main_content = $main->findNewsArticle($slug);
                $content = 'filter_article';
            }
            else if ($slug == '404'){
                $content = '404';
            }

            else{
                $main_content = $main->findStractId($slug);
                $content = 'page';
            }
        }


}else{
    $main_content = $main->showArticles();
}
?>