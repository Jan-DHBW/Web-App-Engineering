<?php

function db_user_getId($con, $name)
{
    $collection = $con->users;

    $filter = ['name' => ['$eq' => $name]];

    $findOneResult = $collection->findOne($filter);

    if (empty($findOneResult)) {
        return false;
    }

    return (string) $findOneResult['uid'];
}
