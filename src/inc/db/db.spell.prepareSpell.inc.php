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
        ['cid' => $cid, 'spells.spell_id' => $bspellid],
        ['$set' => [
                'spells.$.prepared' => true
            ]
        ]
        );
}
    function unprepareSpell($con,$spell, $cid){
        $col='characters';
        $collection = $con->$col;
        if($spell instanceof MongoDB\BSON\ObjectID){
            $bspellid = $spell;
        }
        else{
        $bspellid = new MongoDB\BSON\ObjectID($spell);
        }
        $updateOneResult = $collection->updateOne(
            ['cid' => $cid, 'spells.spell_id' => $bspellid],
            ['$set' => [
                    'spells.$.prepared' => false
                ]
            ]
        );
}
?>