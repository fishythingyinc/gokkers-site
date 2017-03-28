<?php
//session_start();
//// remove all session variables
//session_unset();
//
//// destroy the session
//session_destroy();
//header("Location: index.php");

require('app/SessionHandler.php');
session_start();
$sessionhandler = new \app\SessionHandler();
$sessionhandler->Logout();

header("Location: index.php");
?>