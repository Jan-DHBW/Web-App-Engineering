<?php

function deleteSpell($con,$spell,$uid){
    $col = 'userspells';
    $collection = $con->$col;
    if($spell instanceof MongoDB\BSON\ObjectID){
        $bspellid = $spell;
    } else {
    $bspellid = new MongoDB\BSON\ObjectID($spell);
    };
    $deleteOneResult = $collection->deleteOne(
        [
            '_id' => ['$eq' => $bspellid], 
            'uid' => ['$eq' => $uid]
        ]
    );

    return $deleteOneResult;


}


?>