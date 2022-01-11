<?php
require_once("inc/head.inc.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/style_signup.css">

    <title>D&D Spellbook</title>
</head>

<body>
    
    <form action="inc/signup.inc.php" method="post">
        <img id="main-bg-img" src="../../img/mythicTome.png">

        <div class="signup-form">
            <div>
                <h1><strong>Sign Up</strong></h1>
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
            </div>

    </form>

</body>