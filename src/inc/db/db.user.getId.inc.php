<?php

function db_user_getId($con, $uid){
    $col = "users";
    $collection = $con->$col;

    $filter = ['uid' => ['$eq' => $uid]];

    $resObj = $collection->findOne($filter);

    if(empty($resObj)){
        return null;
    }

    return (string) $resObj['_id'];
}
