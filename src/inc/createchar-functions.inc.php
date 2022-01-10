<?php

function emptyInput($uid, $name, $level, $class)
{
    if (empty($uid)) return true;
    if (empty($name)) return true;
    if (empty($level)) return true;
    if (empty($class)) return true;

    return false;
}

function uidExists($con, $uid)
{
    return db_user_uidExists($con, $uid);
}

