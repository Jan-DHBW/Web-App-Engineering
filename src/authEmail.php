<?php

if(isset($_GET['token'])){
    //requirements
    require_once("inc/db/dbh.inc.php");
    require_once("inc/db/db.user.isValidHashTokenAuthEmail.inc.php");
    require_once("inc/db/db.user.verifyHashTokenAuthEmail.inc.php");
    require_once("inc/db/db.user.destroyHashTokenAuthEmail.inc.php");
    require_once("inc/hash.inc.php");
    require_once('inc/regex.inc.php');
    

    //sanatize parameter
    $token = sanitizeHashToken($_GET['token']);

    //check token valid
    //TODO: check toke expired
    if(isTokenValid($DB, $token) === false){
        header('location: errorPage.php?err=pageNotFound');
        exit();
    }

    //
    destroyToken($DB, $token);
    header('location: ../');
    //redirect to other site
}

function isTokenValid($con, $token){
    return db_user_isValidHashTokenAuthEmail($con, $token);
}

function destroyToken($con, $token){
    db_user_verifyHashTokenAuthEmail($con, $token);
    db_user_destroyHashTokenAuthEmail($con, $token);
}