<?php
session_start();
require('app\SQLHandler.php');
$sqlHandler = new \app\SQLHandler();

$username = $_POST['username'];
$password = $_POST['password'];
$passwordEncrypt = md5($password);

if ($sqlHandler->GetData($username, $passwordEncrypt))
{
    $message =  "You are successfully logged in!";
    $_SESSION['username'] = $username;
    $_SESSION['message'] = $message;
}
else {
    $message = "Login incorrect";
    $_SESSION['message'] = $message;
}

header("Location: index.php");
?>