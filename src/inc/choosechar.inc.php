<?php
    function getCharactersByUser($uid){
        $chars = array();
        $chars[0] = json_encode(array("uid"=>1,"charName"=>"Olaf", "charLvl"=>"1"));
        $chars[1] = json_encode(array("uid"=>2,"charName"=>"Torben", "charLvl"=>"3"));

        return $chars;
    }
?>