<?php

if(isset($_GET['token'])){
    //requirements
    require_once("inc/db/dbh.inc.php");
    require_once("inc/hash.inc.php");

    //sanatize parameter
    $token = sanitizeHashToken($_GET['token']);

    //TODO: check toke expired

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