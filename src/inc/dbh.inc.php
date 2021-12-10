<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");

    //TODO: SEC ISSUE: plaintext pwd
    $m = new MongoDB\Client("mongodb+srv://root:testPwd!@cluster0.ojodh.mongodb.net/dnd-spellbook?retryWrites=true&w=majority");
    $db = "dnd-spellbook";
    $col = "users";
    
    $collection = $m->$db->$col;

    $filter = ['uid' => ['$eq' => 'test']];

    $rs = $collection->find($filter);

    foreach($rs as $doc){
        var_dump($doc);
    }

   
?>