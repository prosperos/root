<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 23.02.17
 * Time: 18:35
 */

if (!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['text']) && !empty($_POST['id_artile']) && !empty($_POST['slug_artile'])) {
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $text = $_POST['text'];
    $id_artile = $_POST['id_artile'];
    $slug_artile = $_POST['slug_artile'];
}
