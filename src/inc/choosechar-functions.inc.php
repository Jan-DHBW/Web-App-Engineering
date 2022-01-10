<?php
    
    function showCharacters($con, $uid){
        $chars = db_char_getCharactersByUID($con, $uid);
        $elmtCnt = 0;

        foreach($chars as $elmt){
            echo '<tr>';
            echo '<th scope="row">';
            echo e($elmtCnt);
            echo '</th>';
            //echo '<td><img src="https://cdn.animenachrichten.de/wp-content/uploads/2019/05/Demon-Slayer-Kimetsu-no-Yaiba-07.jpg" alt="" border=3 height=100 width=150></img></td>';
            echo '<td>'.e($elmt->name).'</td>';      //name
            echo '<td>'.e($elmt->class).'</td>';     //class
            echo '<td>'.e($elmt->level).'</td>';     //level
            echo "<td>";
            echo '<form name"'.$elmtCnt.'" action="inc/choosechar.inc.php" method="post">';
            echo '<input type="hidden" name="cid" value="'.e($elmt->cid).'">';
            echo '<input type="hidden" name="uid" value="'.e($elmt->uid).'">';
            echo '<input type="hidden" name="name" value="'.e($elmt->name).'">';
            echo '<input type="hidden" name="class" value="'.e($elmt->class).'">';
            echo '<input type="hidden" name="level" value="'.e($elmt->level).'">';
            echo '<button type="submit" class="btn btn-primary" name="btnShowSpells" value="true">Show Spells</button>';
            echo '<button type="submit" class="btn btn-primary" name="btnEditCharacter" value="true">Edit</button>';
            echo '<button type="submit" class="btn btn-primary" name="btnDeleteCharacter" value="true">Delete</button>';
            echo "</form>";
            echo "</td>";
            echo '</tr>';

            $elmtCnt++;
        }
    }
?>