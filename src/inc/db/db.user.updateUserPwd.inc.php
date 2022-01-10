<?php


function db_user_updateUserPwd($con, $token, $pwdHash)
{
    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['resetHashToken' => ['$eq' => $token]],
        ['$set' => ['pwd' => $pwdHash]]
    );
}
