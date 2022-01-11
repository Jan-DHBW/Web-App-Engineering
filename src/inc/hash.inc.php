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
