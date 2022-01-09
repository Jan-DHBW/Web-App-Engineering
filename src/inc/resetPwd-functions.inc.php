<?php

function emptyInput($pwd, $pwdRepeat)
{
    if (empty($pwd)) return true;
    if (empty($pwdRepeat)) return true;

    return false;
}

function destroyHashTokenResetPwd($con, $token)
{
    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['resetHashToken' => ['$eq' => $token]],
        ['$unset' => ['resetHashToken' => '']]
    );
}


function updateUserPwd($con, $token, $pwdHash)
{
    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['resetHashToken' => ['$eq' => $token]],
        ['$set' => ['pwd' => $pwdHash]]
    );
}


function pwdMatch($pwd, $pwdRepeat)
{
    if ($pwd !== $pwdRepeat) return false;

    return true;
}


