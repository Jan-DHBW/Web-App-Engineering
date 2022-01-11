<?php

function db_user_verifyHashTokenAuthEmail($con, $hashToken)
{
    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['authHashToken' => ['$eq' => $hashToken]],
        ['$set' => ['isVerified' => true]]
    );
    
    if(!empty($updateOneResult)){
        return true;
    }

    return false;
}
