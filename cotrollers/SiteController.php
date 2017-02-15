<?php
session_start();
//session_destroy();
//exit;
require 'models/MainClass.php';
require 'helpers/ClientClass.php';
require 'cotrollers/constan.php';
require 'models/FindClass.php';

$base_url = 'http://localhost/new/';
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
            else if ($slug == 'login') {
                $content = 'login';
            }


            else if ($slug == 'log_in') {
                include 'helpers/login_user.php';
                    $login_user = $main->loginUser($email, $pass);

                    if (!empty($login_user->num_rows)) {
                        $_SESSION['LOGIN_ERROR'] = 0;
                        echo "login ok";
                        if (!empty($login_user->num_rows)) {
                            $_SESSION['EMAIL_ERROR'] = 0;
                            $pass_tmp = md5($pass);
                            $email_arr = mysqli_fetch_assoc($login_user);

                                if ($pass_tmp == $email_arr['password']) {
                                    $_SESSION['PASS_ERROR'] =  0;
                                    $_SESSION['user'] = $email;
                                    header("Location: $base_url"."lk");

                                }else{
                                    $_SESSION['PASS_ERROR'] = 1;
                                    header("Location: $base_url");
                                    echo 'error_pass';
                                }
                        }else{
                            $_SESSION['EMAIL_ERROR'] = 1;
                            header("Location: $base_url");
                            echo 'error_email';
                        }
                    }else{
                        $_SESSION['LOGIN_ERROR'] = 1;
                        header("Location: $base_url");
                        echo 'login_bed';
                    }
                }
            else if( $slug == 'lk'){
                $check_role = $main->check_role($_SESSION['user']);
                if (!empty($check_role) ){
                    if ($check_role == 1){
                        echo "Це адмін";
                    }else if($check_role == 2){
                        echo "Це менеджер";
                    }else if ($check_role == 3){
                        echo "Це клієнт";
                    }
                }else{
                    echo "Це директор";
                }
                $content = 'lk';
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