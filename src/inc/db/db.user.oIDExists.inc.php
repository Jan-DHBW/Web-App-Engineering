<?php


function db_user_oIDExists($con, $oid)
{
    $collection = $con->users;

    $filter = ['_id' => ['$eq' => new MongoDB\BSON\ObjectId($oid)]];

    $findOneResult = $collection->findOne($filter);

    if (empty($findOneResult)) {
        return false;
    }

    return true;
}