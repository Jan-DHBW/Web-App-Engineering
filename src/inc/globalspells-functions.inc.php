<?php

function showSpells($con){
    $spellList = db_spell_getSpells($con);
    $spellCount = 0;

    foreach($spellList as $spell){

        echo '<tr>';
            echo '<th scope="row">';
            echo $spellCount;
            echo '</th>';
            echo '<td>'.$spell->name.'</td>';   //name
            echo '<td>'.$spell->level.'</td>';        //range
            echo '<td>'.$spell->duration.'</td>';        //duration
            echo '<td></td>';        //school
            echo '<td></td>';           //desc
            echo '<td>';
                echo '<form name"'.$spell->index.'" action="inc/globalspells.inc.php" method="post">';
                    echo '<input type="hidden" name="id" value="'.$spell->_id.'">';
                    echo '<button type="submit" class="btn btn-primary" name="btnShowSpellDetails" value="true">Show Details</button>';
                echo "</form>";
            echo '</td>';
        echo '</tr>';

        $spellCount++;
    }
}