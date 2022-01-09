<?php

function db_user_getId($con, $uid)
{
    $collection = $con->users;

    $filter = ['uid' => ['$eq' => $uid]];

    $findOneResult = $collection->findOne($filter);

    if (empty($findOneResult)) {
        return false;
    }

    return (string) $findOneResult['_id'];
}
