<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 13.02.17
 * Time: 11:34
 */
if(stristr($slug, 'vse_predmety') !== FALSE) {
    if (!empty($_GET['start'])){
        $pagination = $main->pagination($limit, $_GET['start']);
    }else{
        $pagination = $main->pagination($limit,1);
    }
}else{
    if (!empty($_GET['start']) && $_GET['start'] != 0){
        $pagination = $main->paginationCat($limit, $_GET['start'], $slug);
    }else{
        $pagination = $main->paginationCat($limit,0, $slug);

    }
}
