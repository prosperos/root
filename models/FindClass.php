<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 23.01.17
 * Time: 14:12
 */
class FindClass{

    private $db;
    private $conn;

    function __construct(){
        $this->conn = mysqli_connect("localhost","root","root","videourok");
        mysqli_set_charset( $this->conn, 'utf8');

    }

    function searchArticles($find_slag) {
        $search = mysqli_query($this->conn, "SELECT * FROM categories_item WHERE content_full LIKE '%$find_slag%'");
        return $search;
    }

    function takeTypeArticle(){
        $take_type = mysqli_query($this->conn, "SELECT * FROM type_article");
        return $take_type;
    }
}