<?php

function showSpells($con){
    $spellList = db_spell_getSpells($con);

    foreach($spellList as $spell){
        
    }
}