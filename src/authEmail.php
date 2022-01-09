<?php

if(isset($_GET['token'])){
    //requirements
    require_once("inc/db/dbh.inc.php");
    require_once("inc/db/db.user.isValidHashTokenAuthEmail.inc.php");
    require_once("inc/hash.inc.php");
    

    //sanatize parameter
    $token = sanitizeHashToken($_GET['token']);

    //TODO: check token valid
    //TODO: check toke expired
    if(isTokenValid($DB, $token) === false){
        header('location: errorPage.php?err=pageNotFound');
        exit();
    }

    $collection = $DB->users;

    $updateOneResult = $collection->updateOne(
        ['authHashToken' => ['$eq' => $token]],
        ['$set' => ['isVerified' => true]]
    );

    $updateOneResult = $collection->updateOne(
        ['authHashToken' => ['$eq' => $token]],
        ['$unset' => ['authHashToken' => '']]
    );

    //redirect to other site
}

function isTokenValid($con, $token){
    return db_user_isValidHashTokenAuthEmail($con, $token);
}