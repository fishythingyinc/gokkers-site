<?php

require('app/Validator.php');
require('app/SQLHandler.php');
$validator = new \app\Validator();
$sqlHandler = new \app\SQLHandler();
$email_valid;
session_start();


    if (isset($_POST['username']) && !empty ($_POST['username']))
    {
        $username = $_POST['username'];

    }
    if (isset($_POST['password']) && !empty ($_POST['password']))
    {
        $password = $_POST['password'];
        $passwordEncrypt = md5($password);
    }
    if (isset($_POST['email']) && !empty ($_POST['email']))
    {
        $email = $_POST['email'];
        if ($validator->Validate($email))
        {
            echo "Email is valid.";
            $email_valid = true;
        }
        else {
            echo "Email is invalid.";
            $email_valid = false;
        }
    }
    if (isset($_POST['ToS']) && !empty($_POST['ToS']))
    {
        $ToS = $_POST['ToS'];
    }

if ($email_valid)
{
    if ($sqlHandler->InsertData($username, $passwordEncrypt, $email))
    {
        $message = "You successfully registered an account!";
        $_SESSION['message'] = $message;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['ToS']  = $ToS;

    }
    else {
        $_SESSION['message'] = "An error has occurred while registering";
    }
}

    header("Location: Activator.php");
?>