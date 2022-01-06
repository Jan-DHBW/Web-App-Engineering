<?php
function db_user_createUser($con, $name, $email, $pwd)
{
    $col = "users";

    $collection = $con->$col;

    $newDocument = array(
        "uid" => $name,
        "email" => $email,
        "pwd" => $pwd,
        "isVerified" => false
    );

    $collection->insertOne($newDocument);
}
