<?php

session_start();
unset($_SESSION['uid']);
unset($_SESSION['cid']);
unset($_SESSION['username']);

session_destroy();

header("location:/");

?>