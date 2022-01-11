<?php


function db_user_updateUserPwdByUID($con, $uid, $pwdHash)
{
    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['uid' => ['$eq' => $uid]],
        ['$set' => ['pwd' => $pwdHash]]
    );
}
