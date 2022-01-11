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
    if(!isTokenValid($DB, $token)){
        header('location: errorPage.php?err=pageNotFound');
        exit();
    }

    //
    destroyToken($DB, $token);

    //redirect to other site
    header('location: ../');
}else{
    header('location: errorPage.php?err=pageNotFound');
    exit();
}

function isTokenValid($con, $token){
    return db_user_isValidHashTokenAuthEmail($con, $token);
}

function destroyToken($con, $token){
    db_user_verifyHashTokenAuthEmail($con, $token);
    db_user_destroyHashTokenAuthEmail($con, $token);
}