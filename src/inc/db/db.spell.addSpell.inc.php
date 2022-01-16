<?php
function addSpell($con,$spell, $cid){
    $col='characters';
    $collection = $con->$col;
    if($spell instanceof MongoDB\BSON\ObjectID){
        $bspellid = $spell;
    } else {
    $bspellid = new MongoDB\BSON\ObjectID($spell);
    };
    $updateOneResult = $collection->updateOne(
        ['cid' => ['$eq' => $cid]],
        ['$addToSet' => [
            'spells' =>[
                'spell_id' => $bspellid,
                'prepared' => true
            ]
        ]
        
        
        ]
    );

}
?>