<?php


function db_user_uidExists($con, $uid)
{
    $collection = $con->users;

    $filter = ['uid' => ['$eq' => $uid]];

    $findOneResult = $collection->findOne($filter);

    if (empty($findOneResult)) {
        return false;
    }

    return true;
}