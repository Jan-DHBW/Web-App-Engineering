<?php

if(isset($_GET['token'])){
    //requirements
    require_once("inc/db/dbh.inc.php");
    require_once("inc/hash.inc.php");
    require_once('regex.inc.php');

    //sanatize parameter
    $token = sanitizeHashToken($_GET['token']);

    //TODO: check toke expired

    $collection = $DB->users;

    $updateOneResult = $collection->updateOne(
        ['deleteHashToken' => ['$eq' => $token]],
        ['$set' => ['isMarkedForDeletion' => true]]
    );

    $updateOneResult = $collection->updateOne(
        ['deleteHashToken' => ['$eq' => $token]],
        ['$unset' => ['deleteHashToken' => '']]
    );

    //redirect to other site
}