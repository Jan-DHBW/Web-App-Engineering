<?php


function db_char_updateCharacter($con, $cid, $uid, $name, $level, $class){
    $collection = $con->characters;

    $updateOneResult = $collection->updateOne(
        ['cid' => ['$eq' => $cid]],
        ['uid' => ['$eq' => $uid]],
        ['$set' => [
            'name' => $name,
            'class' => $class,
            'level' => $level
            ]
        ]
    );

    return $updateOneResult;
}