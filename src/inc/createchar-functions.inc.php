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
    return true;
}


function invalidLevel($level)
{
    return true;
}


function invalidClass($class)
{
    return true;
}


function userIdExists()
{
    return false;
}

