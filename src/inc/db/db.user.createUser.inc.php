<?php
    function db_user_createUser($con, $name, $email, $pwd){
        $col = "users";

        $collection = $con->$col;

        $newDocument = array(
            "uid" => $name,
            "email" => $email,
            "pwd" => $pwd
        );

        $collection->insertOne($newDocument);
    }


    require_once("dbh.inc.php");

    db_user_createUser($DB_spellbook, "luis", "test123@test.com", "1234");
?>