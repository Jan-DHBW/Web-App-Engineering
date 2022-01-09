<?php

function db_user_verifyPassword($con, $name, $pwd)
{
    $col = "users";
    $collection = $con->$col;

    $filter = ['name' => ['$eq' => $name]];

    $resObj = $collection->findOne($filter);

    if (empty($resObj)) {
        return false;
    }

    return verifyPwd($pwd, $resObj['pwd']);
}
