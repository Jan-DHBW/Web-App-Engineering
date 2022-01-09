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
        ['resetHashToken' => ['$eq' => $token]],
        ['$unset' => ['resetHashToken' => '']]
    );

    //redirect to other site
}