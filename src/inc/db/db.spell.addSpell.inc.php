<?php

function addSpell($spell, $cid){
    $col='characters';
    $collection = $DB->$col;
    $bspellid = new MongoDB\BSON\ObjectID($spellid)
    $updateOneResult = $collection->updateOne(
        ['cid' => ['$eq' => $cid]],
        ['$push' => [
            'spells' =>[
                'spell_id' => $bspellid,
                'prepared' => true
            ]
        ]
        
        
        ]
    )

}



?>