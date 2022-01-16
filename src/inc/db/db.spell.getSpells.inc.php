<?php

function db_spell_getSpells($con){
    $result = array();

    $collection = $con->spells;

    $findResult = $collection->find(
        [],
        [
            '_id' => 1,
            'index' => 0,
            'name' => 1,
            'desc' => 1,
            'higher_level' => 0,
            'range' => 1,
            'components' => 1,
            'material' => 1,
            'ritual' => 1,
            'duration' => 1,
            'concentration' => 1,
            'casting_time' => 1,
            'level' => 1,
            'attack_type' => 1,
            'damage' => 0,
            'school' => 1,
            'classes' => 0,
            'subclasses' => 0,
            'url' => 0
        ]
    );


    foreach($findResult as $elmt){
        $spell = new Spell();
        $j = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($elmt)), true);

        $spell->_id = isset($j['_id']) ? $j['_id']['$oid'] : null;
        $spell->index = isset($j['index']) ? $j['index'] : null;
        $spell->name = isset($j['name']) ? $j['name'] : null;
        $spell->desc = isset($j['desc']) ? $j['desc'] : null;
        $spell->range = isset($j['range']) ? $j['range'] : null;
        $spell->components = isset($j['components']) ? implode(', ',$j['components']) : null;
        $spell->material = isset($j['material']) ? $j['material'] : null;
        $spell->ritual = isset($j['ritual']) ? $j['ritual'] : false;
        $spell->duration = isset($j['duration']) ? $j['duration'] : null;
        $spell->concentration = isset($j['concentration']) ? $j['concentration'] : null;
        $spell->level = isset($j['level']) ? $j['level'] : null;
        $spell->casting_time = isset($j['casting_time']) ? $j['casting_time'] : null;
        $spell->attack_type = isset($j['attack_type']) ? $j['attack_type'] : null;
        $spell->school = isset($j['school']) ? $j['school']['name'] : null;
        $spell->area_of_effect = isset($j['area_of_effect']) ? implode(', ', $j['area_of_effect']) : null;

        $result[] = $spell;
    }


    return $result;
}
function db_spell_getCharSpells($con, $uid){
    

}


?>