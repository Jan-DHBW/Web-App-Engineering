<?php

function db_char_createCharacter($con, $cid, $user_id, $name, $class, $level){
    $collection = $con->characters;

    $insertOneResult = $collection->insertOne(
        [   
            'cid' => $cid,
            'user_id' => $user_id,
            'level' => $level,
            'name' => $name,
            'class' => $class           
        ]);

    if(empty($insertOneResult)){
        return false;
    }

    return $cid;
}


