<?php

function showEditCharSpells($con,$cid,$uid){
    $spellList = db_char_getEditSpellList($con,$uid,$cid);
    $spellCounter = 0;

    foreach($spellList as $spell){

        echo '<tr>';
            echo '<th scope="row">';
            echo e($spellCounter);
            echo '</th>';
            echo '<td>'.e($spell->name).'</td>';   //name
            echo '<td>'.e($spell->level).'</td>';        //range
            echo '<td>'.($spell->ritual ? 'yes' : 'no').'</td>';        //ritual
            echo '<td>'.($spell->concentration ? 'yes' : 'no').'</td>';        //school
            echo '<td>'.e($spell->casting_time).'</td>';        //cast_time
            echo '<td>'.e($spell->duration).'</td>';        //duration
            echo '<td>';
                echo '<div class="dropdown">';
                    echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSpellDetails_'.e($spell->index).'" data-bs-toggle="dropdown" aria-expanded="false">';
                    echo '</button>';
                    echo '<form class="dropdown-menu dropdown-menu-dark position-fixed spell-details-form" aria-labelledby="dropdownSpellDetails_'.e($spell->index).'">';
                        echo '<div class="mb-4 mx-4 my-2 fs-4 text-uppercase">';
                            echo '<div class="spell-attribute">'.e($spell->name).'</div>';
                        echo '</div>';
                        echo '<div class="mb-3 mx-4 row">';
                        echo '<div class="spell-attribute col-auto">Level:</div>';
                            echo '<div class="spell-content col-auto px-3">'.e($spell->level).'</div>';
                        echo '</div>';
                        echo '<div class="mb-3 mx-4 row">';
                            echo '<div class="spell-attribute col-auto">School:</div>';
                            echo '<div class="spell-content col-auto px-3 mb-3">'.e($spell->school).'</div>';
                        echo '</div>';
                        echo '<div class="mb-3 mx-4 row">';
                            echo '<div class="spell-attribute col-auto">Ritual:</div>';
                            echo '<div class="spell-content col-auto px-3">'.($spell->ritual ? 'yes' : 'no').'</div>';
                        echo '</div>';
                        echo '<div class="mb-3 mx-4 row">';
                            echo '<div class="spell-attribute col-auto">Concentration:</div>';
                            echo '<div class="spell-content col-auto px-3">'.($spell->concentration ? 'yes' : 'no').'</div>';
                        echo '</div>';
                        echo '<div class="mb-3 mx-4 row">';
                            echo '<div class="spell-attribute col-auto">Components:</div>';
                            echo '<div class="spell-content col-auto px-3">'.e($spell->components).'</div>';
                        echo '</div>';
                        if(isset($spell->material)){
                            echo '<div class="mb-3 mx-4 row">';
                                echo '<div class="spell-attribute col-auto">Material:</div>';
                                echo '<div class="spell-content col-10 px-3">'.e($spell->material).'</div>';
                            echo '</div>';
                        }
                        if(isset($spell->dc)){
                            echo '<div class="mb-3 mx-4 row">';
                                echo '<div class="spell-attribute col-auto">Save DC:</div>';
                                echo '<div class="spell-content col-auto px-3">'.e($spell->dc).'</div>';
                            echo '</div>';
                        }
                        if(isset($spell->area_of_effect)){
                            echo '<div class="mb-3 mx-4 row">';
                                echo '<div class="spell-attribute col-auto">Area of Effect:</div>';
                                echo '<div class="spell-content col-auto px-3">'.e($spell->area_of_effect).'</div>';
                            echo '</div>';
                        }
                        echo '<div class="mb-3 mx-4">';
                            echo '<div class="spell-attribute mb-1 mt-5">Description:</div>';
                            foreach($spell->desc as $desc){
                                echo '<p class="desc-content">'.e($desc).'</p>';
                            }
                        echo '</div>';
                    echo '</form>';
                    echo '<td><button type="submit" class="btn btn-primary" name="btnDeleteSpell" value="true">Remove</button></td>';
                echo '</div>';
            echo '</td>';
            echo '</tr>';

        $spellCounter++;
    }
}