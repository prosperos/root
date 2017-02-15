<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 14.02.17
 * Time: 20:47
 */
var_dump($_POST);
if (!empty($_POST['email']) && !empty($_POST['pass'])) {
   // $login = $_POST['login'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
}