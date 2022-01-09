<?php
    require_once("inc/head.inc.php");
?>

<section class ="pwdrecovery-form">
    <h2>Recover Password</h2>
    <form action ="inc/pwdrecovery.inc.php" method ="post">
        <label for="email"><b>E-Mail</b></label>
        <input type="text" placeholder="Enter E-Mail" name="email" required>
        <button name="pwdrecovery" type="submit" value="true">Recover Password</button>
        <div id="err"></div>
    </form>

</section>
