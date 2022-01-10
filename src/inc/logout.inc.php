<?php

session_start();
unset($_SESSION['uid']);
unset($_SESSION['cid']);
unset($_SESSION['username']);

session_destroy();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

header("location:/");

?>