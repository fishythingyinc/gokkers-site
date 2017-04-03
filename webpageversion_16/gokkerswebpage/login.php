<?php

session_start();
require('app/SessionHandler.php');
$sessionhandler = new \app\SessionHandler();
$username = $_POST['username'];
$password = $_POST['password'];
$passwordEncrypt = md5($password);

$sessionhandler->Login($username, $passwordEncrypt);



header("Location: index.php");
?>