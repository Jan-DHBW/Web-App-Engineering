<?php
function prepareSpell($con,$spell, $cid){
    $col='characters';
    $collection = $con->$col;
    if($spell instanceof MongoDB\BSON\ObjectID){
        $bspellid = $spell;
    }
    else{
    $bspellid = new MongoDB\BSON\ObjectID($spell);
    };
    $updateOneResult = $collection->updateOne(
        ['cid' => ['$eq' => $cid], 'spells.spell_id'=>['eq' => $bspellid]],
        ['$set' => [
                'spells.$.prepared' => true
            ]
        ]
    )
}
    function unprepareSpell($con,$spell, $cid){
        $col='characters';
        $collection = $con->$col;
        if($spellid instanceof MongoDB\BSON\ObjectID){
            $bspellid = $spell;
        }
        else{
        $bspellid = new MongoDB\BSON\ObjectID($spell);
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