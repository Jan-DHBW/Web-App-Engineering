<?php

function db_user_getId($con, $name)
{
    $collection = $con->users;

    $findOneResult = $collection->findOne(
        ['name' => ['$eq' => $name]]
    );

    if (empty($findOneResult)) {
        return false;
    }

    return (string) $findOneResult['uid'];
}
