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

$countViews = $act->countViews();
$lastVisit = $act->lastVisit();

$countViewsArticle = $main->countViewsArticle($slug);


$limit = 4;



if (!empty($slug)){

    $id = $main->categoruId($slug);//іd категорії

        if (!empty($id)){
            $main_content = $main->categoruArticle($id);
            if($slug == 'vse_predmety'){
                $main_content = $main->showArticles();


                if (!empty($_GET['start'])){
                    echo 111;
                    $pagination = $main->pagination($limit, $_GET['start']);
                }else{
                    echo 222;
                    $pagination = $main->pagination($limit,1);
                }

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
//            else if (is_numeric($slug) == true){
//                $main_content = $main->findArticle($slug);
//                $content = 'article';
//            }
            else if($slug == FIND) {
                $content = FIND;
                $find_slag = $_POST['words'];
                $main_content = $FindClass->searchArticles($find_slag);
            }

            else if ( $slug == 'blog'  ) {
                $main_content = $main->showArticles();
            }
            else if ($slug == 'news' || $slug == 'free_video' || $slug == 'tips' || $slug == 'raznoe'){
                $main_content = $main->findNewsArticle($slug);
                $content = 'filter_article';
                }
            else if ($slug == '404'){
                $content = '404';
            }
            else{

                $main_content = $main->findStractId($slug);
                if (!empty($main_content)){
                    $content = 'page';
                }else{
                    //header(Location: $content = '404');
                    $content = '404';
                }

            }
        }


}else{
    $main_content = $main->showArticles();
}
?>