<?php

function db_char_createCharacter($con, $cid, $uid, $name, $class, $level){
    $collection = $con->characters;
    $spells = array();

    $insertOneResult = $collection->insertOne(
        [   
            'cid' => $cid,
            'uid' => $uid,
            'level' => $level,
            'name' => $name,
            'class' => $class,  
            'spells' => $spells         
        ]);

    if(empty($insertOneResult)){
        return false;
    }

    return $cid;
}


