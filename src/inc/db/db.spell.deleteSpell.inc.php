<?php

function deleteSpell($con,$spell,$charid){
    $col = 'charspells';
    $collection = $con->$col;
    if($spell instanceof MongoDB\BSON\ObjectID){
        $bspellid = $spell;
    } else {
    $bspellid = new MongoDB\BSON\ObjectID($spell);
    };
    $deleteOneResult = $collection->deleteOne(
        [
            '_id' => ['$eq' => $bspellid], 
            'char_id' => ['$eq' => $charid]
        ]
    );

    return $deleteOneResult;


}


?>