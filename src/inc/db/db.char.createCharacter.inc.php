<?php

function db_char_createCharacter($con, $uid, $name, $class, $level){
    $collection = $con->characters;

    $insertOneResult = $collection->insertOne(
        [
            'user_id' => $uid,
            'level' => $level,
            'name' => $name,
            'class' => $class           
        ]);

    if(empty($insertOneResult)){
        return false;
    }

    return (string) $insertOneResult['_id'];
}


