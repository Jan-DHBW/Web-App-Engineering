<?php
function hashPwd($pwd)
{
    return password_hash($pwd, PASSWORD_ARGON2ID);
}

function verifyPwd($pwd, $hash)
{
    return password_verify($pwd, $hash);
}

function getAuthHashToken($text)
{
    $hash = password_hash($text, PASSWORD_ARGON2ID);
    $authHashToken = substr($hash, strpos($hash, "$"));

    return $authHashToken;
}
