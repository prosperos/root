<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 18.01.17
 * Time: 12:19
 */
class ClientClass{

    function activeItem($slug, $manu_item, $flag) {

        if( $slug == $manu_item ){
            $active = $flag;

        }else{
            $active = '';
        }
        return $active;
    }

    function countViews(){

        $visitCounter = 0;
        if(!empty($_COOKIE['visitCounter'])){
            $visitCounter = $_COOKIE['visitCounter'];
        }
        $visitCounter++;
        setcookie('visitCounter', $visitCounter, 0x7FFFFFFF);
        return $visitCounter;





    }
    function lastVisit(){
        $lastVisit = '';
        if (!empty($_COOKIE['lastVisit'])) {
            $lastVisit = date('d-m-Y H:i:s', $_COOKIE['lastVisit']);
        }
        setcookie('lastVisit', time(), 0x7FFFFFFF);
        return $lastVisit;
    }
}
