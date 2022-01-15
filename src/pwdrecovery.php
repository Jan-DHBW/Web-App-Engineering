<?php
require_once("inc/head.inc.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/style_pwdrecovery.css">

    <title>D&D Spellbook</title>
</head>

<body>

    <form action="inc/pwdrecovery.inc.php" method="post">
        <img id="main-bg-img" src="../../img/mythicTome.png">

        <div class="pwdrecovery-form">
            <div>
                <h1 style="font-size: larger;"><strong>Recover Password</strong></h1>
                <label for="email"><b>E-Mail</b></label>
                <input type="text" placeholder="Enter E-Mail" name="email" required>
                <button class="submit" name="pwdrecovery" type="submit" value="true">Recover Password</button>
                <div id="err"></div>
            </div>
        </div>
    </form>

</body>