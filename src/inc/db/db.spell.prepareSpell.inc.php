<?php
function prepareSpell($spell, $cid){
    $col='characters';
    $collection = $DB->$col;
    if($spellid instanceof MongoDB\BSON\ObjectID){
        $bspellid = $spellid;
    };
    else{
    $bspellid = new MongoDB\BSON\ObjectID($spellid);
    };
    $updateOneResult = $collection->updateOne(
        ['cid' => ['$eq' => $cid], 'spells.spell_id'=>['eq' => $bspellid]],
        ['$set' => [
                'spells.$.prepared' => false
            ]
        ]
        ]
    );

}
?>