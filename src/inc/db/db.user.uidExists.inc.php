<?php

function db_user_uidExists($con, $name)
{
    $col =  "users";
    $collection = $con->$col;

    $filter = ['name' => ['$eq' => $name]];

    $cursor = $collection->find($filter);

    foreach ($cursor as $doc) {
        return true;
    }

    return false;
}
