<?php
    require_once("inc/head.inc.php");
?>

<section class ="resetPwd-form">
    <h2>Sign Up</h2>
    <form action ="inc/resetPwd.inc.php" method ="post">
        <label for="pwd"><b>New Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" required>
        <label for="pwdRepeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="pwdRepeat" required>
        <button name="resetpwd" type="submit" value="true">Save New Password</button>
        <div id="err"></div>
    </form>

</section>