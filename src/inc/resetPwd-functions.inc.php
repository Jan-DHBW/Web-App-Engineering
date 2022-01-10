<?php

function emptyInput($pwd, $pwdRepeat)
{
    if (empty($pwd)) return true;
    if (empty($pwdRepeat)) return true;

    return false;
}

function destroyHashTokenResetPwd($con, $token)
{
    db_user_destroyHashTokenResetPwd($con, $token);
}


function updateUserPwd($con, $token, $pwdHash)
{
    db_user_updateUserPwd($con, $token, $pwdHash);
}


function pwdMatch($pwd, $pwdRepeat)
{
    if ($pwd !== $pwdRepeat) return false;

    return true;
}


