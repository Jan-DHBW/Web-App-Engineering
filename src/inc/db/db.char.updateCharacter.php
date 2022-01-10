<?php


function db_char_updateCharacter($con, $cid, $name, $level, $class){
    $collection = $con->characters;

    $updateOneResult = $collection->updateOne(
        ['cid' => ['$eq' => $cid]],
        ['$set' => [
            'name' => $name,
            'class' => $class,
            'level' => $level
            ]
        ]
    );

    return $updateOneResult;
}