<?php

require('app/SessionHandler.php');
session_start();
$sessionhandler = new \app\SessionHandler();
$sessionhandler->Logout();

header("Location: index.php");
?>