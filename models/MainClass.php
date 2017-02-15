<?php 

/**
* 
*/

class MainClass{

    private $db;
    private $conn;

    function __construct(){
        $this->conn = mysqli_connect("localhost","root","root","videourok");
        mysqli_set_charset( $this->conn, 'utf8');

    }

    function showMenu(){
        $menu = mysqli_query($this->conn, "SELECT * FROM struct");
        return $menu;
    }

    function showLeftMenu(){
        $left_menu = mysqli_query($this->conn, "SELECT * FROM categories");
        return $left_menu;
    }
    function showArticles(){
        $articles = mysqli_query($this->conn, "SELECT * FROM categories_item");
        return $articles;
    }
    function categoruArticle($myId){

        $catArticle = mysqli_query($this->conn, "SELECT * FROM categories_item WHERE parent = '$myId'");
        //var_dump($catArticle);
        return $catArticle;
    }

    function categoruId($slug){
        $catId = mysqli_query($this->conn, "SELECT * FROM `categories` WHERE `slug`= '$slug'");
        $id = mysqli_fetch_assoc($catId);
        $myId = $id['id'];
        return $myId;

    }

    function findStractId( $slug ) {
        $stractId = mysqli_query($this->conn, "SELECT * FROM struct where slug_struct = '$slug'");
        $strId = mysqli_fetch_assoc($stractId);
        $contentStract = $strId['content'];

        return $contentStract;
    }

    function findArticle ($id) {
        $find_Article = mysqli_query($this->conn, "SELECT * FROM categories_item WHERE id = $id");
        $find_Id_Article = mysqli_fetch_assoc($find_Article);
        return $find_Id_Article;
    }

    function findArticleSlug($slug){
        $find_article_slug = mysqli_query($this->conn, "SELECT * FROM categories_item WHERE content_full_slug = '$slug'");
        $find_slug = mysqli_fetch_assoc($find_article_slug);
        return $find_slug;
    }

    function findNewsArticle($slug){
        $findNews = mysqli_query($this->conn, "SELECT * FROM type_article WHERE parent_categories = '$slug'");
        $findNewsSlug = mysqli_fetch_assoc($findNews);
        $find_id = $findNewsSlug['id'];
        $find_content_articles = mysqli_query($this->conn, "SELECT * FROM categories_item WHERE con_type_categories = $find_id");
        return $find_content_articles;
    }


    function countViewsArticle($slug){
        if (!empty($slug)) {
            $result = mysqli_query ($this->conn, "SELECT * FROM categories_item WHERE content_full_slug = '$slug'");
            $update = mysqli_query ($this->conn, "UPDATE categories_item SET counter=counter+1 WHERE content_full_slug = '$slug'");
            $result_query = mysqli_query($this->conn, "SELECT * FROM categories_item WHERE content_full_slug = '$slug'");
            return $result_query;
        }
    }
    function pagination($limit, $this_page_first_result){
        $result = mysqli_query($this->conn, "SELECT id FROM categories_item" );
        $pages = $result->num_rows / $limit;
        $pages = ceil($pages);
        $result_query = mysqli_query($this->conn, "SELECT * FROM categories_item ORDER BY id DESC LIMIT $this_page_first_result, $limit");
        $my_arr = array($pages, $result_query);
    return $my_arr;
    }


    function registration($login,$email,$pass){
        $query = mysqli_query($this->conn, "INSERT INTO `users`(`login`, `email`, `password`) VALUES ('$login', '$email', '$pass')" );
        return $query;
    }
    function loginUser($login, $pass){
        $pass = md5($pass);
        $name_data = mysqli_query($this->conn, "SELECT * FROM users WHERE login = '$login' AND password = '$pass'");
        return $name_data;
    }
    function check_role($login){
        $name_data = mysqli_query($this->conn, "SELECT * FROM users WHERE login = '$login'");
        $role = mysqli_fetch_assoc($name_data);
        return $role['role'];

    }

}
