<?php


function db_user_isValidHashTokenResetPwd($con, $hashToken)
{
    $collection = $con->users;

    $findOneResult = $collection->findOne(
        ['resetHashToken' => ['$eq' => $hashToken]]
    );
    
    if(!empty($findOneResult)){
        return true;
    }

    return false;
}
