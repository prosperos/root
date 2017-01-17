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

        $catArticle = mysqli_query($this->conn, "SELECT * FROM categories_item WHERE parent = $myId");
        //var_dump($catArticle);
        return $catArticle;
    }

    function categoruId($chpy){
        var_dump($chpy);
        $catId = mysqli_query($this->conn, "SELECT * FROM `categories` WHERE `chpy`= '$chpy'");

        var_dump($catId);
        $id = mysqli_fetch_assoc($catId);

        $myId = $id['id'];
        return $myId;

    }


}
