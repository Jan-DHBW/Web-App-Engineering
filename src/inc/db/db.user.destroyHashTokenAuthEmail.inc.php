<?php

function db_user_destroyHashTokenAuthEmail($con, $hashToken)
{
    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['authHashToken' => ['$eq' => $hashToken]],
        ['$unset' => ['authHashToken' => '']]
    );
    
    if(!empty($updateOneResult)){
        return true;
    }

    return false;
}
