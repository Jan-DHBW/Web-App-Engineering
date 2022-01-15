<?php
function removeSpell($spell, $cid){
    $col='characters';
    $collection = $DB->$col;
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