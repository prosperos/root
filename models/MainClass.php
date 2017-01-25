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

}
