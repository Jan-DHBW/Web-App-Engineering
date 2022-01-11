<?php


function db_user_isValidHashTokenAuthEmail($con, $hashToken)
{
    $collection = $con->users;

    $findOneResult = $collection->findOne(
        ['authHashToken' => ['$eq' => $hashToken]]
    );
    
    if(!empty($findOneResult)){
        return true;
    }

    return false;
}
