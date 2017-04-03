<?php
//session_start();
//// remove all session variables
//session_unset();
//
//// destroy the session
//session_destroy();
//header("Location: index.php");

require('SessionHandler.php');
$sessionhandler = new \app\SessionHandler();
$sessionhandler->Logout();

header("Location: ../index.php");
?>