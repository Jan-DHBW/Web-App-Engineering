<?php

function db_user_isEmailVerifiedByName($con, $name){
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

    return true;
}