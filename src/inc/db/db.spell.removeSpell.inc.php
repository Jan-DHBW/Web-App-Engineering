<?php
function removeSpell($con,$spell, $cid){
    $col='characters';
    $collection = $con->$col;
    if($spellid instanceof MongoDB\BSON\ObjectID){
        $bspellid = $spellid;
    };
    else{
    $bspellid = new MongoDB\BSON\ObjectID($spellid);
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