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
}