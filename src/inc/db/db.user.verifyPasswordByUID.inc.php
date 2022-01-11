<?php

function db_user_verifyPasswordByUID($con, $uid, $pwd)
{
    $col = "users";
    $collection = $con->$col;

    $filter = ['uid' => ['$eq' => $uid]];

    $resObj = $collection->findOne($filter);

    if (empty($resObj)) {
        return false;
    }

    return verifyPwd($pwd, $resObj['pwd']);
}