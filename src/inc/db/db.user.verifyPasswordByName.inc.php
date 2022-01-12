<?php

function db_user_verifyPasswordByName($con, $name, $pwd)
{
    $collection = $con->users;

    $findOneResult = $collection->findOne(
        [
            'name' => ['$eq' => $name], 
            'isVerified' => ['$eq' => true]
        ]
    );

    if (empty($findOneResult)) {
        return false;
    }

    return verifyPwd($pwd, $findOneResult['pwd']);
}
