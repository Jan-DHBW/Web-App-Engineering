<?php

    //require_once("../../../vendor/autoload.php");
    if($_SERVER['DOCUMENT_ROOT'] == ""){
        require_once("../../../vendor/autoload.php");
    }else{
        require_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");
    }

    function createDbConnection(){
        //TODO: SEC ISSUE: plaintext pwd
        $m = new MongoDB\Client("mongodb+srv://root:testPwd!@cluster0.ojodh.mongodb.net/dnd-spellbook?retryWrites=true&w=majority");
        $db = "dnd-spellbook";
        
        return $m->$db;
    }
    
    $DB_spellbook = createDbConnection();
