<?php
session_start();
require('app/Validator.php');
$validator = new \app\Validator();
$key = md5("ActivationK3y");
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$validator->SendMail($username, $key, $email);
header("Location: index.php");
