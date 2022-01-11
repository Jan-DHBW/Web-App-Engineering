<?php

function db_user_createHashTokenAuthEmail($con, $uid, $hashToken)
{

    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['uid' => ['$eq' => $uid]],
        ['$set' => ['authHashToken' => $hashToken]]
    );
    
}
