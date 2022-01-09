<?php

function emptyInput($userId, $name, $level, $class)
{
    if (empty($userId)) return true;
    if (empty($name)) return true;
    if (empty($level)) return true;
    if (empty($class)) return true;

    return false;
}

function invalidName($name)
{
    return !preg_match('/^[a-z0-9\040\.\-]+$/i', $name);
}


function invalidLevel($level)
{
    if(!preg_match('/^[0-9]/', $level))  return true;
    if($level > 20) return true;    

    return false;
}


function invalidClass($class)
{
    return preg_match('/[^a-zA-Z\s:-]+/', $class);
}


function invalidUserId($con, $id)
{
    return !db_user_uidExists($con, $id);
}

