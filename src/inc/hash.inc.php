<?php
function hashPwd($pwd)
{
    return password_hash($pwd, PASSWORD_ARGON2ID);
}

function verifyPwd($pwd, $hash)
{
    return password_verify($pwd, $hash);
}

function getHashToken($text)
{
    $hash = password_hash($text, PASSWORD_ARGON2ID);

    $revHash = strrev($hash);
    $revHashToken = substr($revHash, 0, strpos($revHash, "$"));
    $hashToken = strrev($revHashToken);
    $sanatizedHashToken = sanitizeHashToken($hashToken);

    return $sanatizedHashToken;
}

function sanitizeHashToken($token){
    $token = str_replace(' ', '', $token);
    $token = preg_replace('/[^A-Za-z0-9\-]/','', $token);

    return $token;
}

function sanitize($text){
    return preg_replace('/[^A-Za-z0-9\-]/','', $text);
}


function sanitizeEmail($email){
    return filter_var($email, FILTER_SANITIZE_EMAIL);
}
