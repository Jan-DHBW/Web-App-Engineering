<?php

    require_once("dbh.inc.php");

    $col = "characters";
    
    $collection = $DB_spellbook->$col;

    $filter = ['user_id' => ['$eq' => '61b366ee689f7efa0345ceb5']];

    $rs = $collection->find($filter);

    foreach($rs as $doc){
        var_dump($doc);
    }
