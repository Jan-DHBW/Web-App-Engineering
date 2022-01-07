<?php

session_start();
unset($_SESSION['current_user_id']);
header("location:/");

?>