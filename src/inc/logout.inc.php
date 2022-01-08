<?php

session_start();
unset($_SESSION['current_user_id']);
session_destroy();
header("location:/");

?>