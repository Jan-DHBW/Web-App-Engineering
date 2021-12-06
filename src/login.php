<?php
    require_once("inc/head.inc.php");

?>


<section class ="login-form">
    <h2>Login</h2>
    <form action ="inc/login.inc.php" method ="post">
        <label for="uid"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uid" required>
        <label for="pwd"><b>Username</b></label>
        <input type="password" placeholder="Password" name="pwd" required>
        <button class="submit" type="submit">Login</button>
    </form>

</section>