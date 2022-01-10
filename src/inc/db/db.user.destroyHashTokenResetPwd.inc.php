<?php


function db_user_destroyHashTokenResetPwd($con, $token)
{
    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['resetHashToken' => ['$eq' => $token]],
        ['$unset' => ['resetHashToken' => '']]
    );
}