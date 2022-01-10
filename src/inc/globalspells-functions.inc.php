<?php

function showSpells($con){
    $spellList = db_spell_getSpells($con);
    $spellCount = 0;

    foreach($spellList as $spell){

        echo '<tr>';
            echo '<th scope="row">';
            echo e($spellCount);
            echo '</th>';
            echo '<td>'.e($spell->name).'</td>';   //name
            echo '<td>'.e($spell->level).'</td>';        //range
            echo '<td>'.e($spell->duration).'</td>';        //duration
            echo '<td></td>';        //school
            echo '<td></td>';           //desc
            echo '<td>';
                echo '<form name"'.e($spell->index).'" action="inc/globalspells.inc.php" method="post">';
                    echo '<input type="hidden" name="id" value="'.e($spell->_id).'">';
                    echo '<button type="submit" onclick="togglePopup" class="btn btn-primary">Show Details</button>';
                echo "</form>";
            echo '</td>';
            echo '</tr>';

        $spellCount++;
    }
}

//echo '<div class="popup" id="popup-1">';
//echo '<div class="overlay"></div>';
//echo '<div class="content">';
//    echo '<div class="close-btn">&times;</div>';
//    echo '<h1>Test</h1>';
//    echo '<p>Test is test where the test is being tested for the test.</p>';