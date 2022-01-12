<?php

function db_user_isEmailVerifiedByUID($con, $uid){
    $collection = $con->users;

    $findOneResult = $collection->findOne(
        [
            'uid' => ['$eq' => $uid], 
            'isVerified' => ['$eq' => true]
        ]
    );

    if (empty($findOneResult)) {
        return false;
    }

    return true;
}