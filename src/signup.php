<?php
    require_once("inc/head.inc.php");
?>

<section class ="signup-form">
    <h2>Sign Up</h2>
    <form action ="inc/signup.inc.php" method ="post">
        <label for="uid"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uid" required>
        <label for="email"><b>E-Mail</b></label>
        <input type="text" placeholder="Enter E-Mail" name="email" required>
        <label for="emailRepeat"><b>Repeat E-Mail</b></label>
        <input type="text" placeholder="Repeat E-Mail" name="emailRepeat" required>
        <label for="pwd"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" required>
        <label for="pwdRepeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="pwdRepeat" required>
        <input class="submit" type="submit" value="Sign Up">
        <div id="err"></div>
    </form>

</section>



