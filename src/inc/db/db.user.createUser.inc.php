<?php
function db_user_createUser($con, $uid, $name, $email, $pwdHash)
{
    $collection = $con->users;

    $newDocument = array(
        "uid" => $uid,
        "name" => $name,
        "email" => $email,
        "pwd" => $pwdHash,
        "isVerified" => false
    );

    $insertOneResult = $collection->insertOne($newDocument);

    return (string) $insertOneResult->getInsertedId();
}
