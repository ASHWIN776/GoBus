<?php
    session_start();

    if(!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"])
    {
        header("location: /index.php");
    }

    $loggedIn = true;
?>