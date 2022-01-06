<?php
function emptyInputSignup($name, $email, $emailRepeat, $pwd, $pwdRepeat)
{
    if (empty($name)) return true;
    if (empty($email)) return true;
    if (empty($emailRepeat)) return true;
    if (empty($pwd)) return true;
    if (empty($pwdRepeat)) return true;

    return false;
}

function invalidUid($username)
{
    //if(preg_match("/^[a-zA-Z0-9]*$/",$username)) return true;

    return false;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return true;

    return false;
}

function emailMatch($email, $emailRepeat)
{
    if ($email !== $emailRepeat) return false;

    return true;
}

function emailExists($con, $email)
{
    return db_user_emailExists($con, $email);
}

function pwdMatch($pwd, $pwdRepeat)
{
    if ($pwd !== $pwdRepeat) return false;

    return true;
}

function uidExists($con, $uid)
{
    return db_user_uidExists($con, $uid);
}

function createUser($con, $uid, $email, $pwd)
{
    $isSuccesfull = false;
    $hash = hashPwd($pwd);

    try {

        $_id = db_user_createUser($con, $uid, $email, $hash);
        db_user_sendAuthEmail($con, $_id, $uid, $email, hashPwd($_id));

        
        $isSuccesfull = true;
    } catch (Exception $ex) {
        
    }

    return $isSuccesfull;
}
