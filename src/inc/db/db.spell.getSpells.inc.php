<?php

function db_spell_getSpells($con, $uid, $cid){
    $result;

    $collection = $con->characters;

    $findResult = $collection->find(
        [
            'uid' => ['$eq' => $uid], 
            'cid' => ['$eq' => $cid]
        ],
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

        $spell->_id = $elmt['_id'];
        $spell->name = $elmt['name'];
        $spell->desc = $elmt['desc'];
        $spell->range = $elmt['range'];
        $spell->components = $elmt['components'];
        $spell->material = $elmt['material'];
        $spell->ritual = $elmt['ritual'];
        $spell->duration = $elmt['duration'];
        $spell->concentration = $elmt['concentration'];
        $spell->level = $elmt['level'];
        $spell->attack_type = $elmt['attack_type'];
        $spell->school = $elmt['school'];

        $result[] = $spell;
    }


    return $result;
}