<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 13.02.17
 * Time: 11:34
 */
if (!empty($_GET['start'])){
    $pagination = $main->pagination($limit, $_GET['start']);
}else{
    $pagination = $main->pagination($limit,1);
}