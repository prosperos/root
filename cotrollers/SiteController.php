<?php
session_start();
//session_destroy();
//exit;
require 'models/MainClass.php';
require 'helpers/ClientClass.php';
require 'cotrollers/constan.php';
require 'models/FindClass.php';
$slug = $_SERVER['QUERY_STRING'];

if (!empty($_GET['route'])){
    $route = $_GET['route'];
}else{
    $route = '';
}
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

$limit = 2;//pagination


if (!empty($slug)){
    $id = $main->categoruId($slug);//іd категорії
    include 'helpers/pagination.php';
        if (!empty($id)){
            $main_content = $main->categoruArticle($id);
            if($slug == 'vse_predmety'){
                $main_content = $main->showArticles();
                include 'helpers/pagination.php';
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

            else if ( $slug == 'blog' ) {
                $main_content = $main->showArticles();
                include 'helpers/pagination.php';
            }
            else if ($slug == 'news' || $slug == 'free_video' || $slug == 'tips' || $slug == 'raznoe'){
                $main_content = $main->findNewsArticle($slug);
                $content = 'filter_article';
                }
            else if ($slug == '404'){
                $content = '404';
            }
            else if($slug == 'registration'){
                $content = 'registration';
            }
            else if ($slug == 'my_reg'){
                include 'helpers/hendler.php';
                if(!empty($login) && !empty($email) && !empty($pass) && !empty($repead_pass)) {


                    if ($pass == $repead_pass) {


                        $registration = $main->registration($login, $email, $pass);
                        $_SESSION['reg'] = 1;

                    }else{
                        $_SESSION['error_check_pass'] = 1;
                        header('Location: registration');
                    }
                }else{
                    $_SESSION['error_enter_data'] = 1;
                    header('Location: registration');
                }
            }
            else if ($slug == 'login'){
                if (!empty($_POST['login'])&& !empty($_POST['pass'])&& !empty($_POST['email'])) {

                    $content = 'login';
                    $main_content = $main->loginUser($login, $email);
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];


                    //$name_arr = mysqli_fetch_assoc($name_data);
                    if (!empty($name_data->num_rows)) {
                        $_SESSION['LOGIN_ERROR'] = 0;

                    }else{
                        $_SESSION['LOGIN_ERROR'] = 1;
                        header('Location:index.php');
                    }



                    if (!empty($email_data->num_rows)) {
                        $_SESSION['EMAIL_ERROR'] = 0;

                        $pass_tmp = md5($pass);

                        $email_arr = mysqli_fetch_assoc($email_data);

                        if ($pass_tmp == $email_arr['password']) {
                            $_SESSION['PASS_ERROR'] =  0;

                        }else{
                            $_SESSION['PASS_ERROR'] = 1;
                            header('Location:index.php');
                        }

                    }else{
                        $_SESSION['EMAIL_ERROR'] = 1;
                        header('Location:index.php');
                    }
                }else{
                    $_SESSION['ERROR_FIELD'] = 1;
                }
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

    include 'helpers/pagination.php';
}
?>