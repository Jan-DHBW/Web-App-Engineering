<?php
function prepareSpell($con,$spell, $cid){
    $col='characters';
    $collection = $con->$col;
    if($spellid instanceof MongoDB\BSON\ObjectID){
        $bspellid = $spellid;
    };
    else{
    $bspellid = new MongoDB\BSON\ObjectID($spellid);
    };
    $updateOneResult = $collection->updateOne(
        ['cid' => ['$eq' => $cid], 'spells.spell_id'=>['eq' => $bspellid]],
        ['$set' => [
                'spells.$.prepared' => true
            ]
        ]
        ]
    );
    function undprepareSpell($con,$spell, $cid){
        $col='characters';
        $collection = $con->$col;
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