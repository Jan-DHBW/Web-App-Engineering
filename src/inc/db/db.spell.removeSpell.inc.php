<?php
function removeSpell($con,$spell, $cid){
    $col='characters';
    $collection = $con->$col;
    if($spell instanceof MongoDB\BSON\ObjectID){
        $bspellid = $spell;
    } else {
    $bspellid = new MongoDB\BSON\ObjectID($spell);
    };
    $updateOneResult = $collection->updateOne(
        ['cid' => ['$eq' => $cid]],
        ['$pull' => [
            'spells' =>[
                'spell_id' => $bspellid
            ]
        ]
        
        
        ]
    );

}
?>