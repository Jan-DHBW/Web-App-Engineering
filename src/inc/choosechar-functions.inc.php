<?php
    
    function showCharacters($con, $uid){
        $chars = db_char_getCharactersByUID($con, $uid);
        $elmtCnt = 0;

        foreach($chars as $elmt){
            echo '<tr>';
            echo '<th scope="row">';
            echo $elmtCnt;
            echo '</th>';
            //echo '<td><img src="https://cdn.animenachrichten.de/wp-content/uploads/2019/05/Demon-Slayer-Kimetsu-no-Yaiba-07.jpg" alt="" border=3 height=100 width=150></img></td>';
            echo "<td>{$elmt->name}</td>";
            echo "<td>{$elmt->class}</td>";
            echo "<td>{$elmt->level}</td>";
            echo "<td>";
            echo '<form name"'.$elmtCnt.'" action="inc/choosechar.inc.php" method="post">';
            echo '<input type="hidden" name="cid" value="'.$elmt->cid.'">';
            echo '<input type="hidden" name="uid" value="'.$elmt->uid.'">';
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