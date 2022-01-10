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

        $spell->_id = isset($elmt['_id']) ? $elmt['_id'] : null;
        $spell->_id = isset($elmt['index']) ? $elmt['index'] : null;
        $spell->name = isset($elmt['name']) ? $elmt['name'] : null;
        $spell->desc = isset($elmt['desc']) ? $elmt['desc'] : null;
        $spell->range = isset($elmt['range']) ? $elmt['range'] : null;
        $spell->components = isset($elmt['components']) ? $elmt['components'] : null;
        $spell->material = isset($elmt['material']) ? $elmt['material'] : null;
        $spell->ritual = isset($elmt['ritual']) ? $elmt['ritual'] : null;
        $spell->duration = isset($elmt['duration']) ? $elmt['duration'] : null;
        $spell->concentration = isset($elmt['concentration']) ? $elmt['concentration'] : null;
        $spell->level = isset($elmt['level']) ? $elmt['level'] : null;
        $spell->attack_type = isset($elmt['attack_type']) ? $elmt['attack_type'] : null;
        $spell->school = isset($elmt['school']) ? $elmt['school'] : null;
        $spell->area_of_effect = isset($elmt['area_of_effect']) ? $elmt['area_of_effect'] : null;

        $result[] = $spell;
    }


    return $result;
}