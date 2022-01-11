<?php

function emptyInput($oldPwd, $newPwd, $newPwdRepeat){
    if (empty($oldPwd)) return true;
    if (empty($newPwd)) return true;
    if (empty($newPwdRepeat)) return true;

    return false;
}


function pwdMatch($pwd, $pwdRepeat)
{
    if ($pwd !== $pwdRepeat) return false;

    return true;
}


function uidValid($con ,$uid){
    return db_user_uidExists($con, $uid);
}

function verifyOldPwd($con, $uid, $pwd){
    return db_user_verifyPasswordByUID($con, $uid, $pwd);
}

function updateUserPwd($con, $uid, $pwd){
    $hashedPwd = hashPwd($pwd);
    return db_user_updateUserPwdByUID($con, $uid, $hashedPwd);
}