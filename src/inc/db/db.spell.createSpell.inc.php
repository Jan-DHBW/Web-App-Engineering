<?php

function createSpell($con,$index,$name,$desc,$range,$comp,$mater,$ritual,$duratio,$concentration,$lvl,$cast_time,$attack_type,$damage,$school,$area_of_effect,$creator){
    $col = 'charspells';
    $collection = $con->$col;
    $insertOneResult = $collection->insertOne(
        [
        'index' => $index,
        'name' => $name,
        'desc' => $desc,
        'range' => $range,
        'components' => $comp,
        'material' => $mater,
        'ritual' => $ritual,
        'duration' => $duratio,
        'concentration' => $duratio,
        'casting_time' => $cast_time,
        'level' => $lvl,
        'attack_type' => $attack_type,
        'school' => $school,
        'damage' => $damage,
        'area_of_effect' => $area_of_effect,
        'char_id' => $creator
        ]
        
        );
    if(empty($insertOneResult)){
        return false;
    }
    return $insertOneResult;
}
?>