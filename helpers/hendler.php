<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 13.02.17
 * Time: 11:04
 */

if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass_repead'])) {

    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $repead_pass = (md5($_POST['pass_repead']));
}