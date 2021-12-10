<?php

    //$manager = new MongoDB\Driver\Manager("mongodb://admin:admin@localhost:27017");
    $manager = new MongoDB\Driver\Manager("mongodb+srv://root:testPwd!@cluster0.ojodh.mongodb.net/dnd-spellbook?retryWrites=true&w=majority");
    $filter = [];
    $options = ["uid" => "test1"];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $manager->executeQuery('dnd-spellbook.users', $query);
    
    

    foreach($cursor as $doc){
        var_dump($doc);
    }
?>