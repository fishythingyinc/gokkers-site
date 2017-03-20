<?php
require('app\Validator.php');
$validator = new \app\Validator();
$key = md5("ActivationK3y");
$validator->SendMail("Jtech", $key, "jtech@alwaysdata.net");
header("index.php");
