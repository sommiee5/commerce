<?php
    session_start();
    require_once("classes/User.php");
    $user = new User;
    $user->signout();
    $_SESSION['good_msg'] = "You have successfully logged out...";
    header("location:index.php");


?>